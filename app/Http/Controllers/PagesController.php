<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
    
class PagesController extends Controller {
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|e-mail',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('test@mgial.com');
            $message->subject($data['subject']);
        });

        return redirect('/')->with('message', 'Send Contact Successfully!');
    }
}