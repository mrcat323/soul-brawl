<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index()
    {
        $subs = Subscribers::all();
        return response()->json($subs);
    }
    public function store(Request $request)
    {
        Subscribers::create($request->all());
    }
}
