<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Complaint;
use App\Models\TripRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintsController extends Controller
{
    public function index()
    {
        $data = Complaint::paginate(100);
        $title = "Complains";
        $trips = TripRequest::all();
        return view('admin.complains.list', compact('data','title', 'trips'));
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $this->validateData($request);

        $complaint = Complaint::create($validatedData);

        auth()->user()->activityLog('Complaint created.', [
            'subject' => $validatedData['subject'],
            'rider' => $complaint->rider->first_name . ' ' . $complaint->rider->last_name,
            'driver' => $complaint->driver->first_name . ' ' . $complaint->driver->last_name
        ]);

        return redirect()->back()->with('success', 'Complaint created successfully.');
    }


    public function update(Request $request, $id)
    {
        $Complaint = Complaint::findOrFail($id);
        $validatedData = $this->validateData($request);

        $Complaint->update($validatedData);
        auth()->user()->activityLog('Complaint updated.', [
            'subject' => $validatedData['subject'],
            'rider' => $Complaint->rider->first_name . ' ' . $Complaint->rider->last_name,
            'driver' => $Complaint->driver->first_name . ' ' . $Complaint->driver->last_name
        ]);

        return redirect()->back()->with('success', 'Complaint updated successfully.');
    }

    public function destroy($id)
    {
        $Complaint = Complaint::findOrFail($id);
        auth()->user()->activityLog('Complaint deleted.', [
            'subject' => $Complaint->subject,
            'rider' => $Complaint->rider->first_name . ' ' . $Complaint->rider->last_name,
            'driver' => $Complaint->driver->first_name . ' ' . $Complaint->driver->last_name
        ]);
        $Complaint->delete();

        return redirect()->back()->with('success', 'Complaint deleted successfully.');
    }

    private function validateData(Request $request): array
    {
        $rules = [
            'subject' => 'required',
            'ride_id' => 'required',
            'complain' => 'required',
            'by' => 'nullable',
            'status' => 'required',
            'driver' => 'nullable',
            'rider' => 'nullable',
        ];

        return $request->validate($rules);
    }
}
