<?php

namespace App\View\Components;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\View\Component;

class PlanStatusBadge extends Component
{
    public Plan $plan;
    public int $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Plan $plan)
    {
        $this->plan = $plan;

        $started_at = new Carbon($this->plan->started_at);
        $finished_at = new Carbon($this->plan->finished_at);
        $now = new Carbon();

        if ($now->lt($started_at)) {
            $this->status = 0;
        } else if ($now->between($started_at, $finished_at)) {
            $this->status = 1;
        } else if ($now->gt($finished_at)) {
            $this->status = 2;
        } else {
            $this->status = 0;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.plan-status-badge');
    }
}
