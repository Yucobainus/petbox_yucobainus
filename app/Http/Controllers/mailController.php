<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function send(Request $req)
    {
        $dogA = $req->height;
        $dogB = $req->arm;
        $dogC = $req->width;
        $dogD = $req->fullheight;
        $phone = $req->phone;
        $inititals = $req->inititals;
        Mail::send(['text' => 'email'], [
            'dogA' => $dogA,
            'dogB' => $dogB,
            'dogC' => $dogC,
            'dogD' => $dogD,
            'phone' => $phone,
            'initials' => $inititals
        ], function ($message) {
            $message->to('petboxme0@gmail.com', 'Новый заказ!')->subject('Новый заказ');
            $message->from('petboxme0@gmail.com', 'Новый заказ!');
        });
    }
}
