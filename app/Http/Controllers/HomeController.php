<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendPushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Kutia\Larafirebase\Facades\Larafirebase;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }




    public function notification(){


        try{
            $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
            // dd($fcmTokens);
            // Notification::send(null,new SendPushNotification('Hi','Hallo',$fcmTokens));
            $rspoce = Larafirebase::withTitle(now() . " test")
                ->withBody('Hi Kamal & Ahmed')
                ->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
                ->withImage('https://firebase.google.com/images/social.png')
                ->withClickAction('https://www.google.com')
                ->withPriority('high')
                ->withAdditionalData([
                    'color' => '#rrggbb',
                    'badge' => 0,
                ])
                ->sendNotification($fcmTokens);
            /* or */
            dd('done' , now()  ,$fcmTokens , $rspoce);
            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

            /* or */



            return redirect()->back()->with('success','Notification Sent Successfully!!');

        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }
}
