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
        return view('pages.description.index');
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
    public function update(Request $request, Description $decription)
    {
        //
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
