<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index() {
        $data = ['username' => 'moahmed'];
        return response()->json($data);
    }
}
