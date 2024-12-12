<?php

namespace App\Http\Controllers\Features;

use PDF;
use Carbon\Carbon;
use App\Models\Badge;
use App\Models\Member;
use App\Models\Rating;
use App\Models\Billing;
use App\Models\Listing;
use App\Models\MainUser;
use Illuminate\Http\Request;
use App\Exports\MembersExport;
use App\Models\BillingHistory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::leftjoin('businesses','users.id','businesses.user_id')
        ->select('users.*','businesses.id as business_id', 'businesses.business_name')
        ->get();
        
        $ratings = Rating::leftJoin('reviews','ratings.id','reviews.ratings_id')
        ->select('ratings.*', DB::raw('COUNT(reviews.id) as review_count'))
        ->addSelect('reviews.user_id as liked_rating_user_id')
        ->groupBy('ratings.id','liked_rating_user_id')
        ->get();

        $ratingValues = [
            'Fair' => 1,
            'Satisfied' => 2,
            'Unsure' => 3,
            'Disappointed' => 4,
            'Aggrevated' => 5,
        ];
        
        $businessRatings = $ratings->groupBy('business_id');
        
        $businessesWithAverageRatings = [];
        
        foreach ($businessRatings as $businessId => $businessRatingsCollection) {
            $totalRatings = $businessRatingsCollection->count();
            
            if ($totalRatings > 0) {
                $totalRatingSum = $businessRatingsCollection->sum(function ($rating) use ($ratingValues) {
                    return $ratingValues[$rating->rating]; // Get numeric value based on rating text
                });
            
                $averageRating = $totalRatingSum / $totalRatings;
            
                $rating_index = max(0, min(4, floor($averageRating) - 1));
            
                $ratingTexts = array_keys($ratingValues);
            
                $actual_average_rating = $ratingTexts[$rating_index];
            } else {
                // Handle the case where there are no ratings
                $actual_average_rating = 'No Ratings';
            }
            
            $businessesWithAverageRatings[] = [
                'business_id' => $businessId,
                'average_rating' => $averageRating,
                'actual_average_rating' => $actual_average_rating,
            ];
        }

        $responses = DB::table('ratings_response')->get();

        return view('pages.member.index', compact('members', 'businessesWithAverageRatings', 'ratings', 'responses'));

    }
    
    public function subscription($encryptedId)
    {
        $decryptedMemberId = Crypt::decryptString($encryptedId);
    
        $billings = Billing::where('user_id', $decryptedMemberId)->get();
      
        $billing_history = BillingHistory::join('active_subscriptions','billing_history.active_subscription_id','active_subscriptions.id')
            ->join('subscriptions','active_subscriptions.subscription_id','subscriptions.id')
            ->select(
                'billing_history.*',
                'subscriptions.amount as subscription_price',
                'subscriptions.type as subscription_type',
                'active_subscriptions.id as active_subscriptions_id',
                'active_subscriptions.expiry_date_time as expiry_date_time',
                'active_subscriptions.status as status',
                'active_subscriptions.footer as footer',
                'active_subscriptions.reference_id as reference_id',
                'active_subscriptions.user_id as user_id',
            )
            ->where('billing_history.user_id', $decryptedMemberId)
            ->get();
    
        $currentMonthHistory = $billing_history->filter(function ($history) {
            return Carbon::parse($history->created_at)->isCurrentMonth();
        });
    
        $currentYearHistory = $billing_history->filter(function ($history) {
            return Carbon::parse($history->created_at)->isCurrentYear();
        });
    
    
        return view('pages.member.subscription.index', compact('billings', 'billing_history', 'currentMonthHistory', 'currentYearHistory'));
    }

    public function badges($encryptedId)
    {
        $decryptedMemberId = $this->decryptMemberId($encryptedId);
        $member = $this->getMemberWithBusiness($decryptedMemberId);
        $ratings = $this->getRatingsForMember($member->id);
        $member = $this->getMainUser($member->user_id);
        $message = $this->getMemberListingMessage($member->id);
        $badges = Badge::all();

        return view('pages.member.badges.index', compact('member', 'ratings', 'message', 'badges'));
    }
    
    private function decryptMemberId($encryptedId)
    {
        return Crypt::decryptString($encryptedId);
    }
    
    private function getMemberWithBusiness($decryptedMemberId)
    {
        return Member::leftjoin('businesses', 'users.id', 'businesses.user_id')
            ->select('businesses.*', 'users.id as user_id')
            ->where('users.id', $decryptedMemberId)
            ->first();
    }
    
    private function getRatingsForMember($businessId)
    {
        $ratings = Rating::leftJoin('reviews', 'ratings.id', 'reviews.ratings_id')
            ->where('ratings.business_id', $businessId)
            ->select('ratings.*', DB::raw('COUNT(reviews.id) as review_count'))
            ->addSelect('reviews.user_id as liked_rating_user_id')
            ->groupBy('ratings.id', 'liked_rating_user_id')
            ->get();
    
        // Define the mapping for string ratings to numerical values
        $ratingMapping = [
            'Fair' => 4.5,
            'Satisfied' => 4,
            'Unsure' => 3,
            'Disappointed' => 2,
            'Aggrevated' => 1
        ];
    
        // Count the ratings based on the mapped values
        $highlyRatedCount = $ratings->filter(function ($rating) use ($ratingMapping) {
            return isset($ratingMapping[$rating->rating]) && $ratingMapping[$rating->rating] >= 4.5;
        })->count();
    
        $mediumRatedCount = $ratings->filter(function ($rating) use ($ratingMapping) {
            return isset($ratingMapping[$rating->rating]) && $ratingMapping[$rating->rating] >= 3 && $ratingMapping[$rating->rating] < 4.5;
        })->count();
    
        $poorlyRatedCount = $ratings->filter(function ($rating) use ($ratingMapping) {
            return isset($ratingMapping[$rating->rating]) && $ratingMapping[$rating->rating] <= 2;
        })->count();

        $ratingStatus = 'neutral';
        if ($highlyRatedCount >= 1) {
            $ratingStatus = 'Highly Rated';
        } elseif ($mediumRatedCount >= 1) {
            $ratingStatus = 'Medium Rated';
        } elseif ($poorlyRatedCount >= 1) {
            $ratingStatus = 'Poorly Rated';
        }
    
        return $ratingStatus;
    }

    private function getMainUser($userId)
    {
        return MainUser::findOrFail($userId);
    }
    
    private function getMemberListingMessage($memberId)
    {
        $memberListingsCount = Listing::where('availability', 'Available')
            ->where('user_id', $memberId)
            ->count();
    
        $highestListingsCount = Listing::where('availability', 'Available')
            ->selectRaw('user_id, COUNT(*) as count')
            ->groupBy('user_id')
            ->orderBy('count', 'desc')
            ->first();
    
        $isHighest = $highestListingsCount && $highestListingsCount->user_id == $memberId;
    
        return $isHighest ? 'highest' : 'not yet';
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestj
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function export(Request $request)
    {
        $role = $request->values['role'];
        $format = $request->values['format'];

        $members = Member::where('account_type', $role)->get(); // Fetch users based on the selected role

        switch ($format) {
            case 'excel':
                return Excel::download(new MembersExport($members), $role.' Account Members.xlsx');
                break;

            case 'csv':
                return Excel::download(new MembersExport($members), $role.' Account Members.csv', \Maatwebsite\Excel\Excel::CSV, [
                    'Content-Type' => 'text/csv',
                ]);
                break;

            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid export format selected']);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
