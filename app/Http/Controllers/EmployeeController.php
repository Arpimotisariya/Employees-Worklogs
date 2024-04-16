<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkLog;
use App\Models\User;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $workLogs = WorkLog::with('user')->orderBy('date', 'desc')->get();

        $userPreferredHours = User::whereIn('name', $workLogs->pluck('name'))->pluck('preferred_working_hour_per_day', 'name');

        return view('index', ['workLogs' => $workLogs, 'userPreferredHours' => $userPreferredHours]);
    }

    public function filterByDate(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $workLogs = WorkLog::query();

        if ($fromDate && $toDate) {
            $workLogs->whereBetween('date', [Carbon::parse($fromDate), Carbon::parse($toDate)]);
        }

        $workLogs = $workLogs->get();

        return view('index', ['workLogs' => $workLogs]);
    }


   public function create()
    {

        $users = \App\Models\User::all();
        return view('create', ['users' => $users]);

    }



    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'date' => 'required|date',
        'hour' => 'required|integer',
        'note' => 'required|string',
    ]);
    WorkLog::create($validatedData);

    return redirect()->route('index')->with('success', 'Data saved successfully!');
}


    public function edit($id)
    {
        $workLog = WorkLog::findOrFail($id);
        return view('edit', compact('workLog'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'hour' => 'required|integer',
            'note' => 'required|string',
        ]);

        $workLog = WorkLog::findOrFail($id);
        $workLog->update($validatedData);

        return redirect()->route('index')->with('success', 'Data updated successfully!');
    }

    public function destroy($id)
    {
        $workLog = WorkLog::findOrFail($id);
        $workLog->delete();

        return redirect()->route('index')->with('success', 'Data deleted successfully!');
    }
}
