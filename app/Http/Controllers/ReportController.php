<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }
        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);
        if ($validate) {
            $reports = Report::where('status_id', $status)
                ->orderBy('created_at', $sort)
                ->paginate(8);
        } else {
            $reports = Report::orderBy('created_at', $sort)
                ->paginate(8);
        }
        $statuses = Status::all();
        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }



    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Report::create($validated);

        return redirect()->route('reports.index')->with('success', 'Заявление создано!');
    }


    public function show(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')->with('success', 'Заявление обновлено!');
    }


    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Заявление удалено!');
    }
}
