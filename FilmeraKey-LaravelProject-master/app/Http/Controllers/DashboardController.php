<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function index()
    {
        $apiKeys = auth()->user()->apiKeys; //get semua api dari user yang login
        return view('dashboard', compact('apiKeys'));
    }

}
