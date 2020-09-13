<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request){
        // echo date("d M, Y @ h:i A", strtotime("2020-09-12 13:00:00"));
        $data = [];
        $data["user"] = Auth::user();

        return view("profile", $data);
    }
}
