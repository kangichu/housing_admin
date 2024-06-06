<?php

namespace App\Http\Controllers\Features;

use App\Models\Route;
use App\Models\Feature;
use App\Models\RouteHasFeature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FeatureSubscription;
use App\Http\Controllers\Controller;

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
        return DB::transaction(function () use ($request) {
            try{

                $features = $request->formValues;

                foreach($features as $feature)
                {
                    $feature_permission = Str::slug($feature['feature']);
                    $actualFeature = Feature::create([
                        'feature_permission' => $feature_permission,
                        'feature' => $feature['feature'],
                    ]);

                    // Assuming you have a relationship set up between Feature and RouteGroup
                    foreach($feature['route_groups'] as $routeGroupName) 
                    {
                        $route = Route::where('url', $routeGroupName)->first();
                        RouteHasFeature::create([
                            'feature_id' => $actualFeature->id,
                            'route_id' => $route->id,
                        ]);
                    }
                }

                return response()->json([
                    'message' => 'all features have been added.',
                    'status' => 200
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Failed to update features: ' . $e->getMessage(),
                    'status' => 500
                ]);
            }
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscription_features(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try{
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

            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Failed to update features: ' . $e->getMessage(),
                    'status' => 500
                ]);
            }
        });
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
    public function update(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try{
                $features = $request->formValues;

                DB::statement('SET FOREIGN_KEY_CHECKS=0;');

                RouteHasFeature::truncate();
                Feature::truncate();

                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

                foreach($features as $feature)
                {
                    $feature_permission = Str::slug($feature['feature']);
                    $actualFeature = Feature::create([
                        'feature_permission' => $feature_permission,
                        'feature' => $feature['feature'],
                    ]);

                    // Assuming you have a relationship set up between Feature and RouteGroup
                    if (isset($feature['route_groups']))
                    {    
                        foreach($feature['route_groups'] as $routeGroupName) 
                        {
                            $route = Route::where('url', $routeGroupName)->first();
                            RouteHasFeature::create([
                                'feature_id' => $actualFeature->id,
                                'route_id' => $route->id,
                            ]);
                        }
                    }
                }

                return response()->json([
                    'message' => 'all features have been updated.',
                    'status' => 200
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Failed to update features: ' . $e->getMessage(),
                    'status' => 500
                ]);
            }
        });
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
