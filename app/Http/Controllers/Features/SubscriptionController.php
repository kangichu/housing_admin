<?php

namespace App\Http\Controllers\Features;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Route;
use App\Models\Feature;
use App\Models\Subscriber;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::get();

        $routes = Route::get();

        $features = Feature::get();

        $featureURLS = Feature::leftJoin('route_has_features','route_has_features.feature_id','subscription_features.id')
        ->leftJoin('routes','routes.id','route_has_features.route_id')
        ->select('subscription_features.*','routes.url as route_url')
        ->get();

        $linkedFeatures = Feature::join('feature_subscription','subscription_features.id','feature_subscription.feature_id')
        ->select('subscription_features.*','feature_subscription.subscription_id')
        ->get();
        
        $limits = DB::table('subscription_plan_limitations')->get();
			
        return view('pages.subscription.index', compact('subscriptions', 'features', 'limits', 'linkedFeatures','routes','featureURLS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Subscription = new Subscription([
            'type' => $request->values['name'],
            'description' => $request->values['description'],
            'category' => $request->values['category'],
            'amount' => $request->values['charge'],
            'account_type' => $request->values['account_type'],
            'recommended' => $request->values['recommend'],
            'status' => 'Pending',
        ]);

        $Subscription->save();

        return response()->json([
            'message' => 'A new Subscription has been successfully created.',
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription_id = Crypt::decryptString($id);
        
        $subscription = Subscription::find($subscription_id);

        $features = Feature::get();

        $subscribers = Subscriber::join('users','active_subscriptions.user_id','users.id')
        ->join('businesses','users.id','businesses.user_id')
        ->select('businesses.*','users.first_name','users.last_name','users.email','users.full_name_slug',
        'users.mobile','active_subscriptions.status as active_subscriptions_status','active_subscriptions.start_date as active_subscriptions_start_date'
        ,'active_subscriptions.duration')
        ->where('active_subscriptions.subscription_id', $subscription_id)->get();

        $subscriptions = Subscription::get();

        $users = DB::table('users')->join('businesses','users.id','businesses.user_id')->where('users.account_type','Business')->get();

        return view('pages.subscription.show')->with(array('subscription'=>$subscription, 'features'=>$features, 
        'subscribers'=>$subscribers,'subscriptions'=>$subscriptions, 'users'=>$users ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscription_id = Crypt::decryptString($id);
        $subscription = Subscription::find($subscription_id);

        return view('pages.subscription.edit')->with(array('subscription'=>$subscription));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscription = Subscription::find($id);
        $subscription->type = $request->values['name'];
        $subscription->description = $request->values['description'];
        $subscription->category = $request->values['category'];
        $subscription->amount = $request->values['charge'];
        $subscription->account_type = $request->values['account_type'];
        $subscription->recommended = $request->values['recommend'];

        $subscription->update();

        return response()->json([
            'message' => 'The Subscription has been successfully updated.',
            'status' => 200
        ]);
    }

    /**
     * Update the status of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subscription_status(Request $request, $id)
    {
        $subscription = Subscription::find($id);
        $subscription->status = $request->status;

        $subscription->update();

        return response()->json([
            'message' => 'the status has been updated.',
            'status' => 200
        ]);
    }

    /**
     * Add the limits of the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subscription_limits(Request $request)
    {
        $subscription_id = $request->formValues['subscription_id'];
        DB::table('subscription_plan_limitations')->where('subscription_id', $subscription_id)->delete();
        $listing = $request->formValues['Listing'];
        $complex = $request->formValues['Complex'];

        $types = [
            [
                'type' => 'Listing',
                'limit' => $listing,

            ],
            [
                'type' => 'Complex',
                'limit' => $complex,
            ],
        ];

        $current_date_time = Carbon::now();

        foreach($types as $type)
        {
            DB::insert('insert into subscription_plan_limitations 
                (`type`, `limit`, `subscription_id`, `created_at`, `updated_at`) 
                values (?, ?, ?, ?, ?)', [$type['type'], $type['limit'], $subscription_id, $current_date_time->format('Y-m-d H:i:s'), 
                $current_date_time->format('Y-m-d H:i:s')]);

        }

        return response()->json([
            'message' => 'the status has been updated.',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = Subscription::find($id);

        $subscription->delete();  

        return redirect()->back()->with("success","Your subscription plan has been deleted.");
    }
}
