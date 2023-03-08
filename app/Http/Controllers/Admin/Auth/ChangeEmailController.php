<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

class ChangeEmailController extends Controller
{
    public function index()
    {
        return view('admin.auth.change-email');
    }

    public function update()
    {
    }
}
