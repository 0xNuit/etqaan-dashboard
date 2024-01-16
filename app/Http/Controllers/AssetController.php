<?php

namespace App\Http\Controllers;

use App\Helpers\SMSHelper;
use App\Models\Asset; // Make sure to import the Asset model
use App\Models\User; // Make sure to import the Asset model
use App\Models\Procedure; // Make sure to import the Asset model
use Illuminate\Support\Facades\DB;
use App\Models\CommitteeChief; // Make sure to import the CommitteeChief model
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        $owners = CommitteeChief::all();
        $projectManagers = User::where('user_type', 3)->get();
        $procedures = Procedure::all();
        $procedureTerms = DB::table('procedures_terms')->get();
        return view('assets.index', compact('assets', 'procedures', 'procedureTerms', 'projectManagers', 'owners'));
    }

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
            'committee_chief_id' => 'required|exists:committee_chiefs,id',
            'name' => 'required',
            'deed_number' => 'required|unique:assets,deed_number',
            'project_managers' => 'required|array',
            'procedures' => 'required|array',
            // 'procedures.*.selected' => 'required|in:1', // Make sure 'selected' is present and set to 1
            // 'procedures.*.start_at' => 'required|date_format:Y-m-d\TH:i:s', // Adjust the date format as needed
            // 'procedures.*.end_at' => 'required|date_format:Y-m-d\TH:i:s', // Adjust the date format as needed
            // 'procedures.*.user_ids' => 'required|array', // Ensure user_ids is an array
            // 'procedures.*.user_ids.*' => 'exists:users,id', // Validate each user_id in the array
        ]);

        // Create a new asset
        $asset = new Asset();
        $asset->title = $request->input('name');
        $asset->status = 0;
        $asset->committee_chief_id = $request->input('committee_chief_id');
        $asset->deed_number = $request->input('deed_number');
        $asset->save();
        // Attach project managers to the asset
        $asset->users()->sync($request->input('project_managers'));
        // Attach procedures to the asset
        $selectedProcedures = $request->input('procedures');
        foreach ($selectedProcedures as $termId => $procedureData) {
            if (isset($procedureData['selected']) && $procedureData['selected'] == 1) {
                $term = DB::table('procedures_terms')->find($termId);
                if ($term) {
                    $procedure = new Procedure();
                    $procedure->asset_id = $asset->id;
                    $procedure->title = $term->term;
                    $procedure->start_at = $procedureData['start_at'];
                    $procedure->end_at = $procedureData['end_at'];
                    $procedure->notes = '';
                    $procedure->file_name = '';
                    $procedure->save();
                    $procedure->users()->sync($procedureData['user_ids']);
                    
                    // Send SMS to each assigned user
                    foreach ($procedureData['user_ids'] as $userId) {
                        $employee = User::find($userId); // Assuming User model is used
                        if ($employee) {
                            // Adjust the SMS content as needed
                      

                            // dd([
                            //     "date" => $procedure->end_at,
                            //     "start" => $procedure->start_at,
                            //     "name" => $employee->first_name,
                            //     "phone" => $employee->phone,
                            //     "task" => $procedure->title
                            // ]);
    
                            // Send SMS
                            // SMSHelper::sendSMS([$employee->phone], $smsContent);
                            SMSHelper::sendSMS([$employee->phone], __("auth.assignTask", ["date" =>  $procedure->end_at, "start" => $procedure->start_at, "name" => $employee->first_name,"task" => $procedure->title]));

                        }
                    }
                }
            }
        }

        return redirect()->route('asset.index')->with('success', 'Asset added successfully');
    }
    public function test(Request $request)
    {
        try {
            SMSHelper::sendSMS(["0567147271"],["fewfwefew"]);
 
        } catch (\Exception $e) {
            // Log the exception
            Log::error("Exception while sending SMS: " . $e->getMessage());

            // Return a JSON response with the error message
            return response()->json(['status' => 'error', 'message' => 'An error occurred while sending SMS'], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        return view('assets.show', compact('asset'));
    }
    public function client($id)
    {
        $asset = Asset::findOrFail($id);
        return view('assets.client', compact('asset'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the asset by its ID
        $asset = Asset::findOrFail($id);

        // Fetch additional data if needed (e.g., committee chiefs, project managers, procedure terms)

        return view('assets.edit', compact('asset'));
    }
    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         // Validate the form data
         $request->validate([
             'asset_status' => 'required',
             'procedure_notes' => 'required|array',
             'procedure_notes.*' => 'nullable|string',
             'procedure_status' => 'required|array',
             'procedure_status.*' => 'required|in:0,1,2',
             'procedure_titles' => 'required|array',
             'procedure_titles.*' => 'nullable|string',
             'procedure_files.*' => 'nullable|file|mimes:pdf,doc,docx|max:21048',
         ]);
     
         // Find the asset by its ID
         $asset = Asset::findOrFail($id);
         // Update asset status
         $asset->status = $request->input('asset_status');
         $asset->save();
     
         $procedureNotes = $request->input('procedure_notes');
         $procedureStatus = $request->input('procedure_status');
         $procedureTitles = $request->input('procedure_titles');
         $procedureFiles = $request->file('procedure_files');
     

         foreach ($asset->procedures as $index => $procedure) {
            if (
                isset($procedureNotes[$index]) ||
                isset($procedureStatus[$index]) ||
                isset($procedureTitles[$index]) ||
                ($procedureFiles && isset($procedureFiles[$index]))
            ) {
                $originalProcedure = $procedure->getOriginal();
    
                $updates = [];
    
                if (isset($procedureNotes[$index]) && $originalProcedure['notes'] != $procedureNotes[$index]) {
                    $updates['notes'] = $procedureNotes[$index];
                }
                if (isset($procedureStatus[$index]) && $originalProcedure['status'] != $procedureStatus[$index]) {
                    $updates['status'] = $procedureStatus[$index];
                }
                if (isset($procedureTitles[$index])) {
                    $updates['title'] = $procedureTitles[$index];
                } else {
                    $updates['title'] = $originalProcedure['title'];
                }
    
                if ($procedureFiles && isset($procedureFiles[$index])) {
                    $uploadedFile = $procedureFiles[$index];
                    $filePath = $uploadedFile->store('assets');

                    $newImageName = uniqid() . "." .
                    $uploadedFile->getClientOriginalExtension();
                    $uploadedFile->move("assets", $newImageName);

                    if ($originalProcedure['file_name'] != $filePath) {
                        $updates['file_name'] = "assets/".$newImageName;
                    }
                }
                
                if (!empty($updates)) {
                    $procedure->fill($updates);
                    $procedure->last_editor = Auth::user()->first_name;
                    $procedure->save();
    
                    // Check if there are updates before logging
                    if (array_diff_assoc($originalProcedure, $procedure->getAttributes())) {
                        // Log the update
                        $log = new Log();
                        $log->status = ($originalProcedure['status'] != $procedure->status) ? $procedure->status : null;
                        $log->file_name = ($originalProcedure['file_name'] != $procedure->file_name) ? $procedure->file_name : null;
                        $log->notes = ($originalProcedure['notes'] != $procedure->notes) ? $procedure->notes : null;
                        $log->user_name = Auth::user()->first_name;
                        $log->asset_title = $asset->title;
                        $log->procedure_title = $procedure->title;
                        $log->save();
                    }
                }
            }
        }
        // Redirect back to the asset view or another appropriate page
        return redirect()->route('asset.show', $asset->id)->with('success', 'Asset data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
