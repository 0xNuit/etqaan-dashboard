<?php

namespace App\Http\Controllers;
use App\Models\CommitteeChief; // Make sure to import the CommitteeChief model

use Illuminate\Http\Request;

class CommitteeChiefController extends Controller
{ 
    public function index()
    {
        $committeeChiefs = CommitteeChief::all();
        return view('committee_chiefs.index', compact('committeeChiefs'));
    }
    // public function showAssets($id)
    // {
    //     $committeeChief = CommitteeChief::find($id);

    //     if ($committeeChief) {
    //         $assets = $committeeChief->assets;
    //         return view('committee_chiefs.assets', compact('committeeChief', 'assets'));
    //     } else {
    //         // Handle the case when the committee chief is not found
    //         // For example, redirect back or show an error message
    //     }
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validate the request data
           $request->validate([
            'title' => 'required',
            'phone' => 'required',
        ]);
        // Create a new asset
        $committeeChief = new CommitteeChief();
        $committeeChief->title = $request->input('title');
        $committeeChief->phone = $request->input('phone');
        $committeeChief->save();
      
        return redirect()->route('committee_chiefs.index')->with('success', 'committee_chief added successfully');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
