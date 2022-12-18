<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserManagementController extends Controller
{
    public function index() {
		return view('admin.user-management');
	}
}
