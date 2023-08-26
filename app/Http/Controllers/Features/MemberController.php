<?php

namespace App\Http\Controllers\Features;

use PDF;
use App\Models\Member;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Exports\MembersExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
