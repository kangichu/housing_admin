<?php

namespace App\Http\Controllers\Features;

use App\Models\Subscriber;
use App\Models\Subscription;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //
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
        'subscriptions.amount','subscriptions.category','active_subscriptions.reference_id','active_subscriptions.expiry_date_time',
        'users.mobile','active_subscriptions.status as active_subscriptions_status','active_subscriptions.created_at as active_subscriptions_created_at')
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
