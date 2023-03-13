<?php

namespace App\View\Components;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\View\Component;

class PlanCard extends Component
{
    public Plan $plan;
    public string $status_label;
    public string $status_color;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;

        $started_at = new Carbon($this->plan->started_at);
        $finished_at = new Carbon($this->plan->finished_at);
        $now = new Carbon();

        if ($now->lt($started_at)) {
            $this->status_label = '近日開催';
            $this->status_color = 'tw-badge-secondary';
        } else if ($now->between($started_at, $finished_at)) {
            $this->status_label = '開催中';
            $this->status_color = 'tw-badge-primary';
        } else if ($now->gt($finished_at)) {
            $this->status_label = '終了';
            $this->status_color = 'tw-badge-neutral';
        }
    }

    public function render()
    {
        return view('components.plan-card');
    }
}
