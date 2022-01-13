<?php

namespace App\Http\Controllers;

use App\Models\CompletedWork;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function addWork(Request $req)
    {
        $work = new CompletedWork;

        $work->initials = $req->initials;
        $work->species = $req->species;
        $work->price = $req->price;

        //Путь к фотографиям
        $destinationPath = 'public/images/completed/';

        // Фото с собакой
        $fileName = rand(1, 10000) . $req->file('photowithdog')->getClientOriginalName();
        $req->file('photowithdog')->move($destinationPath, $fileName);
        $work->photowithdog = $destinationPath . $fileName;

        // Фото переноски
        $fileName = rand(1, 10000) . $req->file('photobox')->getClientOriginalName();
        $req->file('photobox')->move($destinationPath, $fileName);
        $work->photobox = $destinationPath . $fileName;
        $work->save();

        return response()->json('done', 201);
    }

    public function updateWork(Request $req)
    {
        $work = CompletedWork::find($req->id);

        $work->initials = $req->initials;
        $work->species = $req->species;
        $work->price = $req->price;

        //Путь к фотографиям
        $destinationPath = 'public/images/completed/';

        if ($req->file('photowithdog') != null) {
            // Фото с собакой
            $fileName = rand(1, 10000) . $req->file('photowithdog')->getClientOriginalName();
            $req->file('photowithdog')->move($destinationPath, $fileName);
            $work->photowithdog = $destinationPath . $fileName;
        }

        if ($req->file('photobox') != null) {
            // Фото переноски
            $fileName = rand(1, 10000) . $req->file('photobox')->getClientOriginalName();
            $req->file('photobox')->move($destinationPath, $fileName);
            $work->photobox = $destinationPath . $fileName;
        }
        $work->save();

        return response()->json('done', 201);
    }

    public function getWorks($count)
    {
        if ($count == 'all') {
            return response()->json(['works', CompletedWork::all()]);
        } else {
            return response()->json(['works', CompletedWork::limit($count)->get()]);
        }
    }

    public function removeWork($id)
    {
        return response(['done', CompletedWork::where('id', $id)->delete()]);
    }
    public function getOneWork($id)
    {
        return response(CompletedWork::where('id', $id)->get());
    }
}
