<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $reports = Report::all();
        $statuses = Status::all();
        return view('admin.index', compact('reports', 'statuses'));
    }

    public function changeStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status_id = $request->status_id;
        $report->save();
        
        return redirect()->back();
    }
}
