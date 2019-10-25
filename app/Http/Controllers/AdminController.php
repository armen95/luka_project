<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	/*********** Admin Page View ************/ 
    public function index() {
    	
    	return view('admin/admin');
    }
}
