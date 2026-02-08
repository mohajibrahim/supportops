<?php

use App\Http\Controllers\ChangeRequestController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\KnowledgeBaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RootCauseAnalysisController;
use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => ['status' => 'ok']);

Route::apiResource('incidents', IncidentController::class);
Route::get('incidents/{incident}/root-cause-analysis', [RootCauseAnalysisController::class, 'show']);
Route::post('incidents/{incident}/root-cause-analysis', [RootCauseAnalysisController::class, 'store']);

Route::apiResource('knowledge-base', KnowledgeBaseController::class);
Route::apiResource('change-requests', ChangeRequestController::class);

Route::apiResource('reports', ReportController::class)->only(['index', 'show', 'store']);
Route::post('reports/{report}/run', [ReportController::class, 'run']);
