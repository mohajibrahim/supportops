<?php

namespace App\Http\Controllers;

use App\Models\ChangeRequest;
use Illuminate\Http\Request;

class ChangeRequestController extends Controller
{
    public function index()
    {
        return ChangeRequest::latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requested_by' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'risk_level' => 'required|string|max:50',
            'planned_release_at' => 'nullable|date',
            'approved_by' => 'nullable|string|max:255',
            'deployment_notes' => 'nullable|string',
        ]);

        $changeRequest = ChangeRequest::create($validated);

        return response()->json($changeRequest, 201);
    }

    public function show(ChangeRequest $changeRequest)
    {
        return $changeRequest;
    }

    public function update(Request $request, ChangeRequest $changeRequest)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'requested_by' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|max:50',
            'risk_level' => 'sometimes|required|string|max:50',
            'planned_release_at' => 'nullable|date',
            'approved_by' => 'nullable|string|max:255',
            'deployment_notes' => 'nullable|string',
        ]);

        $changeRequest->update($validated);

        return $changeRequest->fresh();
    }

    public function destroy(ChangeRequest $changeRequest)
    {
        $changeRequest->delete();

        return response()->noContent();
    }
}
