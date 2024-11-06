<?php

namespace App\Http\Controllers\Features;

use App\Models\Route;
use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RouteHasFeature;
use Illuminate\Support\Facades\DB;
use App\Models\FeatureSubscription;
use Illuminate\Support\Facades\Log;
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
        $routes = Route::get();

        $features = Feature::get();

        $featureURLS =  Feature::leftJoin('route_has_features', 'route_has_features.feature_id', 'subscription_features.id')
        ->leftJoin('routes', 'routes.id', 'route_has_features.route_id')
        ->select('subscription_features.id', 'subscription_features.feature', 'subscription_features.description', 'routes.url as route_url')
        ->get()->groupBy('feature')->sortKeys();
        
        return view('pages.subscription.features.index', compact('features', 'routes', 'featureURLS'));
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
            try {
                // Log the incoming request data for debugging
    
                $features = $request->input('values');

                $feature_slug = Str::slug($features['feature']);
                $description = $features['description'];
       
                $actualFeature = Feature::create([
                    'feature_permission' => $feature_slug,
                    'description' => $description,
                    'feature' => $features['feature'],
                ]);
    
                foreach ($features['route_groups'] as $feature) {
                    
                   // Check if the route group name corresponds to a group of resource routes
                   $route = Route::where('url', $feature)
                   ->orWhere('url', $feature)->first();

                    if (!$route) {
                        // If no routes are found with the pattern, try to get a single route
                        $route = collect([Route::where('url', $feature)->first()]);
                    }

                    Log::info("ROUTES: " . $route);

                    RouteHasFeature::create([
                        'feature_id' => $actualFeature->id,
                        'route_id' => $route->id,
                    ]);
                }
    
                return response()->json([
                    'message' => 'All features have been added.',
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
            try {
                // Log the incoming request data for debugging
    
                $features = $request->input('values');

                $feature_slug = Str::slug($features['feature']);
                $description = $features['description'];
                $feature_id = $features['feature_id'];

                $Feature = Feature::findOrFail($feature_id);

                $Feature->update([
                    'feature' => $features['feature'],
                    'description' => $description,
                    'feature_permission' => $feature_slug,
                ]);

                RouteHasFeature::where('feature_id', $feature_id)->delete();
       
                foreach ($features['route_groups'] as $feature) {
                    
                   // Check if the route group name corresponds to a group of resource routes
                   $route = Route::where('url', $feature)
                   ->orWhere('url', $feature)->first();

                    if (!$route) {
                        // If no routes are found with the pattern, try to get a single route
                        $route = collect([Route::where('url', $feature)->first()]);
                    }

                    Log::info("ROUTES: " . $route);

                    RouteHasFeature::create([
                        'feature_id' => $feature_id,
                        'route_id' => $route->id,
                    ]);
                }
    
                return response()->json([
                    'message' => 'All features have been updated.',
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
    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {
            try {
                $Feature = Feature::findOrFail($id);
                RouteHasFeature::where('feature_id', $Feature->id)->delete();
                $Feature->delete();
    
                return response()->json([
                    'message' => 'Your feature has been deleted.',
                    'status' => 200
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Failed to delete feature: ' . $e->getMessage(),
                    'status' => 500
                ]);
            }
        });
    }
    
}
