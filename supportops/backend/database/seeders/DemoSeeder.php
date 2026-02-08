<?php

namespace Database\Seeders;

use App\Models\ChangeRequest;
use App\Models\Incident;
use App\Models\KnowledgeBaseArticle;
use App\Models\Report;
use App\Models\RootCauseAnalysis;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $incident = Incident::create([
            'title' => 'Login failures for staff portal',
            'description' => 'Users report SSO timeouts when accessing the portal.',
            'status' => 'open',
            'priority' => 'high',
            'reported_by' => 'Helpdesk',
            'assigned_to' => 'Application Support',
        ]);

        RootCauseAnalysis::create([
            'incident_id' => $incident->id,
            'summary' => 'Token issuer latency caused session validation errors.',
            'category' => 'Authentication',
            'impact' => 'Staff could not access CRM for 2 hours.',
            'resolution' => 'Failover to backup token issuer.',
            'preventative_actions' => 'Add proactive latency monitoring and alerts.',
        ]);

        $kb = KnowledgeBaseArticle::create([
            'title' => 'SSO timeout troubleshooting checklist',
            'slug' => 'sso-timeout-troubleshooting-checklist',
            'category' => 'Authentication',
            'content' => 'Verify issuer health, check DNS, confirm token expiry, validate firewall rules.',
            'visibility' => 'internal',
        ]);

        $incident->knowledgeBaseArticles()->attach($kb->id);

        ChangeRequest::create([
            'title' => 'Enable secondary token issuer routing',
            'description' => 'Route 30% of traffic to the standby issuer to validate readiness.',
            'requested_by' => 'Infrastructure Team',
            'status' => 'pending-approval',
            'risk_level' => 'medium',
            'planned_release_at' => now()->addWeek(),
            'approved_by' => null,
            'deployment_notes' => 'Validate auth logs and rollback plan before deployment.',
        ]);

        Report::create([
            'name' => 'Incidents by status',
            'description' => 'Counts incidents grouped by status.',
            'sql_query' => 'SELECT status, COUNT(*) AS total FROM incidents GROUP BY status;',
            'is_active' => true,
        ]);
    }
}
