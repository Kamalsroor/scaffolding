<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendPushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Kutia\Larafirebase\Facades\Larafirebase;
use Modules\Admin\Entities\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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




    public function notification(Request $request){


        try{
          // return $request->all();
            $fcmTokens = Admin::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
            // dd($fcmTokens);
            // Notification::send(null,new SendPushNotification('Hi','Hallo',$fcmTokens));
            $rspoce = Larafirebase::withTitle($request->title)
                ->withBody($request->body)
                ->withImage($request->image)
                ->withIcon($request->icon)
                ->withClickAction('https://www.google.com')
                ->withPriority('high')
                ->withAdditionalData([
                    'color' => '#rrggbb',
                    'badge' => 0,
                ])
                ->sendNotification($fcmTokens);
            /* or */
            dd('done' , now()  ,$fcmTokens , $rspoce->body());
            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

            /* or */



            return redirect()->back()->with('success','Notification Sent Successfully!!');

        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }
}
