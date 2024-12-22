<?php

namespace App\Http\Controllers\Features;

use PDF;
use Carbon\Carbon;
use App\Models\Badge;
use App\Models\Member;
use App\Models\Rating;
use App\Models\Billing;
use App\Models\Listing;
use App\Models\Business;
use App\Models\MainUser;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Exports\MembersExport;
use App\Models\BillingHistory;
use App\Jobs\SendWelcomeMailJob;
use App\Models\ActiveSubscription;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\indentificationNumber;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Define common validation rules
        $commonRules = [
            'values.first' => 'required|string|max:255',
            'values.last' => 'required|string|max:255',
            'values.mobile' => 'required|string|max:15',
            'values.email' => 'required|string|email|max:255|unique:users,email',
            'values.user_role' => 'required',
        ];
    
        // Define additional rules for business accounts
        $businessRules = [
            'values.business_name' => 'required|string|max:255',
            'values.registration_number' => 'required|string|max:255',
            'values.date_of_incorporation' => 'required|date_format:m/d/Y',
            'values.business_description' => 'required|string|max:1000',
            'values.business_site' => 'required|string|max:255',
            'values.business_email' => 'required|string|email|max:255',
        ];
    
        // Define additional rules for individual accounts
        $individualRules = [
            'values.national_id' => 'required|string|max:20',
        ];

        // Determine the account type and merge the appropriate rules
        $accountType = $request->values['user_role'];

        if ($accountType === 'Business') {
            $rules = array_merge($commonRules, $businessRules);
        } elseif ($accountType === 'individual') {
            $rules = array_merge($commonRules, $individualRules);
        } else {
            $rules = $commonRules;
        }
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
    
        // Handle validation failures
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' => 422
            ], 422);
        }

        // Create the user
        Log::info('Creating User account.');
        $user = $this->create($request->all());
    
        // Return a JSON response
        return response()->json([
            'message' => 'User registered successfully',
            'status' => 200
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            try {

                $full_name = $data['values']['first'] . ' ' . $data['values']['last'];
                $password = $this->generateSecurePassword(8);

                Log::info('Creating User account.');

                // Check the role's guard name
                $role = Role::where('name', 'business')->first();
                Log::info('Role guard name: ' . $role->name);

                $user = MainUser::create([
                    'first_name' => $data['values']['first'],
                    'last_name' => $data['values']['last'],
                    'full_name_slug' => Str::slug($full_name),
                    'mobile' => $data['values']['mobile'],
                    'email' => $data['values']['email'],
                    'account_type' => 'Business',
                    'password' => Hash::make($password),
                ]);


                // Ensure the role has the correct guard before assigning
                DB::table('model_has_roles')->insert([
                    'role_id' => $role->id,
                    'model_type' => MainUser::class,
                    'model_id' => $user->id,
                ]);

                Log::info('User account created successfully.');

                if($data['values']['demo_account'] == 1)
                {
                    Log::info('User account is a demo account.');

                    $referenceNumber = $this->generateReferenceNumber();

                    $transaction = new \stdClass();
                    $transaction->id = uniqid();
                    $transaction->created_at = Carbon::now();
                    $transaction->user_id = $user->id;
                    $transaction->reference_number = $referenceNumber;
                    $account_type = $data['values']['user_role'];
                    
                    $this->assignSubscription($transaction, $user, $account_type);
                }

                $this->createBusiness($data, $user->id);

                Log::info('Dispatching User Email Verification Email.');

                dispatch(new SendWelcomeMailJob($user, $password)); // Dispatch the job

                Log::info('User account created successfully.');
                
                return response()->json([
                    'message' => 'Member has been successfully created.',
                    'status' => 200
                ]);
                
            } catch (\Throwable $th) {
                //throw $th;
                Log::info($th);
            }
        }); // The second parameter is optional and defines the number of attempts to perform the transaction
        
    }

    protected function generateSecurePassword($length) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    protected function createBusiness($data, $userId)
    {
        Business::create([
            'account_type' => $data['values']['user_role'],
            'business_name' => $data['values']['business_name'],
            'registration_number' => $data['values']['registration_number'],
            'date_of_incorporation' => Carbon::createFromFormat('m/d/Y', $data['values']['date_of_incorporation'])->format('Y-m-d'),
            'business_description' => $data['values']['business_description'],
            'business_site' => $data['values']['business_site'],
            'business_email' => $data['values']['business_email'],
            'is_demo_account' =>  $data['values']['demo_account'] ?? null,
            'user_id' => $userId,
        ]);

        if ($data['values']['user_role'] == "individual") {
            indentificationNumber::create([
                'identification_number' => $data['values']['national_id'],
                'user_id' => $userId,
                'status' => 'Pending',
            ]);
        }
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

    public function checkEmail(Request $request){

        $email = $request->input('email');
        
        $isExists = MainUser::where('email',$email)->exists();

        return response()->json(['exists' => $isExists]);
    }

    public function businesscheckemail(Request $request){

        $email = $request->input('email');
        
        $isExists = Business::where('business_email',$email)->exists();
        
        return response()->json(['exists' => $isExists]);
    }

    protected function generateReferenceNumber()
    {
        return uniqid('ref-', true);
    }

    protected function assignSubscription($transaction, $user, $account_type)
    {
        Log::info('Creating active subscription');
    
        $today = \Carbon\Carbon::now();
        $subscription = Subscription::where([ 'account_type' => $account_type, 'type' => 'Enterprise' ])->first();
        
        if (!$subscription) {
            Log::error('Subscription not found.');
            throw new \Exception('Subscription not found.');
        }
    
        $expiry_date = $today->copy()->addWeek();
        
        $diff_in_days = $expiry_date->diffInDays($today);
        $expiry_date_time = $expiry_date->toDateTimeString();
    
        $footer = 'demo_account';
        $added_by = $user->id;
    
        $activeSubscription = ActiveSubscription::create([
            'subscription_id' => $subscription->subscription_id,
            'start_date' => $today,
            'end_date' => $expiry_date,
            'expiry_date_time' => $expiry_date_time,
            'duration' => $diff_in_days,
            'footer' => $footer,
            'status' => 'active',
            'notification_sent' => 0,
            'reference_id' => $transaction->reference_number,
            'user_id' =>  $user->id,
            'added_by' => $added_by,
        ]);
    
        Log::info('Active subscription created successfully');
    
        return $activeSubscription;
    }

}
