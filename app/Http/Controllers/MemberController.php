<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(9);

        return view('members.index', compact('members'));
    }

    public function show($slug)
    {
        $member = Member::with('plans')->where('slug', $slug)->firstOrFail();

        return view('members.show', compact('member'));
    }
}
