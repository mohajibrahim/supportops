<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\RootCauseAnalysis;
use Illuminate\Http\Request;

class RootCauseAnalysisController extends Controller
{
    public function store(Request $request, Incident $incident)
    {
        $validated = $request->validate([
            'summary' => 'required|string',
            'category' => 'required|string|max:100',
            'impact' => 'required|string',
            'resolution' => 'required|string',
            'preventative_actions' => 'nullable|string',
        ]);

        $rca = RootCauseAnalysis::updateOrCreate(
            ['incident_id' => $incident->id],
            $validated + ['incident_id' => $incident->id]
        );

        return response()->json($rca, 201);
    }

    public function show(Incident $incident)
    {
        return $incident->rootCauseAnalysis;
    }
}
