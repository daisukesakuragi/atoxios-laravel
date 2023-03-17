<?php

namespace App\View\Components;

use App\Models\Plan;
use Illuminate\View\Component;

class PlanCard extends Component
{
    public Plan $plan;
    public string $status_label;
    public string $status_color;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
        $plan_status = $plan->generatePlanStatusLabel();
        $this->status_label = $plan_status['status_label'];
        $this->status_color = $plan_status['status_color'];
    }

    public function render()
    {
        return view('components.plan-card');
    }
}
