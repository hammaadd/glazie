<?php

namespace App\Http\Controllers;
use App\Models\AddOn;
use Illuminate\Http\Request;

class DoorBuilderController extends Controller
{
    public function index()
    {
        $addons = AddOn::all();
        return view('public/doorbuild',['addons'=>$addons]);
    }
}
