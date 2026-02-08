<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('change_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('requested_by');
            $table->string('status');
            $table->string('risk_level');
            $table->timestamp('planned_release_at')->nullable();
            $table->string('approved_by')->nullable();
            $table->text('deployment_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('change_requests');
    }
};
