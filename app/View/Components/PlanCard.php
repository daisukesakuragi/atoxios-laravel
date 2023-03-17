<?php

namespace App\View\Components;

use App\Models\Plan;
use Illuminate\View\Component;

class PlanCard extends Component
{
    public Plan $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function render()
    {
        return view('components.plan-card');
    }
}
