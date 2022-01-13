<?php

namespace App\Http\Controllers;

use App\Models\AppealModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppealController extends Controller
{
    public function newAppeal(Request $req)
    {
        $appeal = new AppealModel;
        $appeal->initial = $req->initial;
        $appeal->number = $req->number;
        $appeal->email = $req->email;
        $appeal->appeal = $req->appeal;
        $appeal->status = "Новая";
        $appeal->save();
        return response()->json('done', 201);
    }

    public function getAppeals()
    {
        return response()->json(['appeals', AppealModel::all()]);
    }

    public function appealStatusChange($id)
    {

        $appeal = AppealModel::find($id);
        if ($appeal->status == "Новая") {
            $appeal->status = "Обработана";
        } elseif ($appeal->status == "Обработана") {
            $appeal->status = "Закрыта";
        } else {
            $appeal->status = "Новая";
        }
        $appeal->save();
        return response()->json(['status', 'done']);
    }

    public function mail(Request $req)
    {
        $initial = $req->initial;
        $number = $req->number;
        $email = $req->email;
        $appeal = $req->appeal;
        Mail::send(['text' => 'appeal'], [
            'initital' => $initial,
            'number' => $number,
            'email' => $email,
            'appeal' => $appeal,
        ], function ($message) {
            $message->to('petboxme0@gmail.com', 'Новый вопрос!')->subject('Новый вопрос');
            $message->from('petboxme0@gmail.com', 'Новый вопрос!');
        });
    }
}
