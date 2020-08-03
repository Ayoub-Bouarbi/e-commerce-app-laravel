<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('site.pages.contact');
    }
    public function sendMessage(Request $request){
        $this->validate($request,
        [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        Mail::send('mail.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message) use ($request)
            {
                $message->from($request->get('email'));
                $message->to('saquib.rizwan@cloudways.com')->subject('Cloudways Feedback');
            });

        return back()->with('success', 'Thanks for contacting us!');
    }
}
