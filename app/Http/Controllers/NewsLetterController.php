<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewsletter;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $news = $request->all();
        ///return $news;
        $subs = Subscribers::where('status', 1)->get();
        foreach ($subs as $sub) {
            dispatch(New SendNewsletter($sub->email, $news));
        }
        return response()->json([
            'msg' => 'SUCCESS',
        ]);
    }
}
