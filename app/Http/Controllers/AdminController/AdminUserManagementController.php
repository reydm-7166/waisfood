<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserManagementController extends Controller
{
    public function index() {
		return view('admin.user-management');
	}
}
