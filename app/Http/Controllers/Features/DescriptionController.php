<?php

namespace App\Http\Controllers\Features;

use App\Models\Description;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions = Description::get();
        return view('pages.description.index')->with(['descriptions'=>$descriptions]);
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
        $type = ($request->values['type'] != 'Other') ? $request->values['type'] : $request->values['new_type'];
        $description = $request->description;

        $description = new Description([
            'type' => $type,
            'description' => $description,
        ]);

        $description->save();

        return response()->json([
            'message' => 'A new description has been successfully added.',
            'status' => 200
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Decription  $decription
     * @return \Illuminate\Http\Response
     */
    public function show(Description $decription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Decription  $decription
     * @return \Illuminate\Http\Response
     */
    public function edit(Description $decription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Decription  $decription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $description = $request->description;

        $Description = Description::find($id);
        $Description->update([
            'description' => $description,
        ]);

        return response()->json([
            'message' => 'The description has been successfully updated.',
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Decription  $decription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Decription $decription)
    {
        //
    }
}
