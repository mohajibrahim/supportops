<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        return Incident::with(['rootCauseAnalysis', 'knowledgeBaseArticles'])->latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|max:50',
            'priority' => 'required|string|max:50',
            'reported_by' => 'required|string|max:255',
            'assigned_to' => 'nullable|string|max:255',
            'resolved_at' => 'nullable|date',
        ]);

        $incident = Incident::create($validated);

        return response()->json($incident, 201);
    }

    public function show(Incident $incident)
    {
        return $incident->load(['rootCauseAnalysis', 'knowledgeBaseArticles']);
    }

    public function update(Request $request, Incident $incident)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|string|max:50',
            'priority' => 'sometimes|required|string|max:50',
            'reported_by' => 'sometimes|required|string|max:255',
            'assigned_to' => 'nullable|string|max:255',
            'resolved_at' => 'nullable|date',
        ]);

        $incident->update($validated);

        return $incident->fresh(['rootCauseAnalysis', 'knowledgeBaseArticles']);
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return response()->noContent();
    }
}
