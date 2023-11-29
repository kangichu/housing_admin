<?php

namespace App\Http\Controllers\Features;

use App\Models\Feature;
use App\Models\FeatureSubscription;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeatureController extends Controller
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

        $features = $request->formValues['kt_feature_repeater_basic'];

        foreach($features as $feature)
        {
            $feature_permission = Str::slug($feature['feature']);
            $feature = new Feature([
                'feature_permission' => $feature_permission,
                'feature' => $feature['feature'],
            ]);

            $feature->save();
        }

        return response()->json([
            'message' => 'all features have been added.',
            'status' => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscription_features(Request $request)
    {

        $feature_ids = $request->values["feature_ids"];
        $subscription_id = $request->values["subscription_id"];

        if (is_array($feature_ids)) {
            foreach($feature_ids as $feature_id)
            {
                $FeatureSubscription = new FeatureSubscription([
                    'feature_id' => $feature_id,
                    'subscription_id' => $subscription_id,
                ]);

                $FeatureSubscription->save();
            }
        }else{
            $FeatureSubscription = new FeatureSubscription([
                'feature_id' => $feature_ids,
                'subscription_id' => $subscription_id,
            ]);

            $FeatureSubscription->save();
        }



        return response()->json([
            'message' => 'all features have been linked.',
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        //
    }

    /**
     * Bulk remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function bulk_destroy(Request $request)
    {

        $features = $request->values['feature'];

        if (is_array($features)) {
            foreach($features as $feature)
            {
                $this_feature = FeatureSubscription::where([
                    "feature_id" => $feature, 
                    "subscription_id" => $request->values["subscription_id"]
                ])->first();

                if ($this_feature) {
                    $this_feature->delete();
                }  
            }
            
        }else{
            $this_feature = FeatureSubscription::where(
                ["feature_id"=> $features, 
                "subscription_id" => $request->values["subscription_id"]
            ])
            ->first();

            $this_feature->delete();  
        }
       

        return response()->json([
            'message' => 'your features have been unlinked.',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        //
    }
    
}
