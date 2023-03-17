<?php

namespace App\View\Components;

use App\Models\Plan;
use Illuminate\View\Component;

class BidButton extends Component
{
    public Plan $plan;
    public int $price;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Plan $plan, int $price)
    {
        $this->plan = $plan;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bid-button');
    }
}
