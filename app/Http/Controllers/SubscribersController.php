<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index()
    {
        $subs = Subscribers::all();
        return response()->json($subs,200);
    }
    public function store(Request $request)
    {
        $user = auth('api')->user();
        $user->subscribers()->create($request->all());
        return response()->json('Success',201);
    }
}
