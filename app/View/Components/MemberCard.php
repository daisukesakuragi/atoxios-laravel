<?php

namespace App\View\Components;

use App\Models\Member;
use Illuminate\View\Component;

class MemberCard extends Component
{
    public Member $member;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.member-card');
    }
}
