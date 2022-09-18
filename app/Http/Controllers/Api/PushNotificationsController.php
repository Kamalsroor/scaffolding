<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Services\Larafirebase;

class PushNotificationsController extends Controller
{


    public function updateToken(Request $request){
        try{
            $request->user()->update(['fcm_token'=>$request->registration_id]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }
}
