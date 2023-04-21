<?php

namespace App\Http\Controllers\Features;

use App\Models\Subscriber;
use App\Models\Subscription;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        try {
            $added_by = auth()->user()->id;
            $plan = $request->values['subscription_id'];
            $customer = $request->values['customer'];
            $subscription_valid_period = $request->values['subscription_valid_period'];
            $footer = $request->values['footer'];

            $customer = User::where('full_name_slug', $customer)->first();

            // split the string into two dates
            $dates = explode(" - ", $subscription_valid_period);
            $start_date = Carbon::createFromFormat('m/d/Y', $dates[0]);
            $end_date = Carbon::createFromFormat('m/d/Y', $dates[1]);

            // calculate the difference in days
            $diff_in_days =(int)($end_date->diffInDays($start_date)); 

            $subscribed = DB::table('active_subscriptions')->where([['user_id', $customer->id], ['status','Active']])->first();

            if($subscribed)
            {
                return response()->json([
                    'message' => 'they already have an active subscription.',
                    'status' => 401
                ]);
            }

            function get_sms_token($length = 4) {

                return rand(
                    ((int) str_pad(1, $length, 0, STR_PAD_RIGHT)),
                    ((int) str_pad(9, $length, 9, STR_PAD_RIGHT))
                );
            }
            
            $token = get_sms_token(4);
            $reference_id = 'sub_'.$token.'_'.$token;
            
            $current_date_time = Carbon::now();

            DB::insert('insert into active_subscriptions 
            (subscription_id, start_date, end_date, duration, footer, status, reference_id, user_id, added_by, created_at, updated_at) 
            values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$plan, $start_date, $end_date, $diff_in_days, $footer, 'Active', $reference_id, 
            $customer->id, $added_by, $current_date_time->format('Y-m-d H:i:s'), $current_date_time->format('Y-m-d H:i:s')]);

            return response()->json([
                'message' => 'they have been successfully subscribed.',
                'status' => 200
            ]);

        } catch(Exception $e) {
            return response()->json([
                'message' => 'looks like we are experincing an issue at the moment. Please try again later.',
                'status' => 404
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('full_name_slug', $slug)->first();

        $subscriber = Subscriber::join('users','active_subscriptions.user_id','users.id')
        ->join('businesses','users.id','businesses.user_id')
        ->join('subscriptions','active_subscriptions.subscription_id','subscriptions.id')
        ->select('businesses.*','users.first_name','users.last_name','users.email','users.full_name_slug','users.avatar','subscriptions.type as subscription_type',
        'subscriptions.amount','subscriptions.category','active_subscriptions.reference_id',
        'users.mobile','active_subscriptions.status as active_subscriptions_status',
        'active_subscriptions.start_date as active_subscriptions_start_date','active_subscriptions.end_date')
        ->where('active_subscriptions.user_id', $user->id)->first();


        return view('pages.subscription.subscribers.index')->with(array('subscriber'=>$subscriber));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
