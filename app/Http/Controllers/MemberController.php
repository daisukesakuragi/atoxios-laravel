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

    public function show($id)
    {
        $member = Member::with('plans')->findOrFail($id);

        return view('members.show', compact('member'));
    }
}
