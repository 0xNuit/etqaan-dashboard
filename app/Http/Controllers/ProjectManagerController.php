<?php

namespace App\Http\Controllers;
use App\Models\User; // Make sure to import the CommitteeChief model

use Illuminate\Http\Request;

class ProjectManagerController extends Controller
{ 
    public function index()
    {
        $project_managers = User::where('user_type', 3)->get();
        // dd($project_managers);
        return view('project_managers.index', compact('project_managers'));
    }
 
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
            'last_name' => 'required',
            'first_name' => 'required',
            'father_name' => 'required',
            // 'password' => 'required',
            'phone' => 'required',
            'id_number' => 'required',
        ]);
        // Create a new asset
        $project_manager = new User();
        $project_manager->father_name = $request->input('father_name');
        $project_manager->first_name = $request->input('first_name');
        $project_manager->last_name = $request->input('last_name');
        // $project_manager->password = $request->input('password');
        $project_manager->id_number = $request->input('id_number');
        $project_manager->phone = $request->input('phone');
        $project_manager->user_type = 3;
        $project_manager->save();
      
        return redirect()->route('project_managers.index')->with('success', 'project_manager added successfully');
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
