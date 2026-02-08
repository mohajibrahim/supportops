<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return Report::where('is_active', true)->latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sql_query' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $report = Report::create($validated);

        return response()->json($report, 201);
    }

    public function show(Report $report)
    {
        return $report;
    }

    public function run(Report $report)
    {
        if (! $report->is_active) {
            return response()->json(['message' => 'Report is disabled.'], 403);
        }

        $results = DB::select($report->sql_query);

        return response()->json([
            'report' => $report,
            'results' => $results,
        ]);
    }
}