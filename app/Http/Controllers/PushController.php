<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PushController extends Controller
{
    public function updateToken(Request $request){
        try{
            $request->user()->update(['fcm_token'=>$request->token]);
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

    public function send($notif, $tokens)
    {
        try{
            Larafirebase::withTitle($notif['title'])
                ->withBody($notif['body'])
                ->withImage(asset('assets/images/favicon/favicon.png'))
                ->withIcon(asset('assets/images/favicon/favicon.png'))
                ->withSound('default')
                ->withClickAction($notif['url'])
                ->withPriority('high')
                ->withAdditionalData([
                    'color' => '#rrggbb',
                    'badge' => 0,
                ])
                ->sendMessage($tokens); 
    
        }catch(\Exception $e){
            report($e);
        }
    }

    public function test()
    {
        //$tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
        
        return Larafirebase::withTitle('This is a test')
            ->withBody('This is a Test body')
            ->withIcon(asset('assets/images/favicon/favicon.png'))
            ->sendMessage(User::find(1)->fcm_token);
    }
}
