<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PathologyOutdoorTestRequest extends Controller
{
    public function index()
    {
        return view('admin.pathology-outdoor-test-request.index', [
            
        ]);
    }
}
