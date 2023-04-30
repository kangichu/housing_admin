<?php

namespace App\Http\Controllers\Features;

use App\Models\Feature;
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

        $subscription_id = $request->formValues['subscription_id'];
        $features = $request->formValues['kt_feature_repeater_basic'];


        foreach($features as $feature)
        {
            $feature = new Feature([
                'subscription_id' => $subscription_id,
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
        $features = $request->values;

        if (is_array($features['feature'])) {
            foreach($features['feature'] as $feature)
            {
                $this_feature = Feature::find($feature);
                $this_feature->delete();  
            }
        }else{
            $this_feature = Feature::find($features['feature']);
            $this_feature->delete();  
        }
       

        return response()->json([
            'message' => 'your features have been deleted.',
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
