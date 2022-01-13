<?php

namespace App\Http\Controllers;

use App\Models\SliderModel;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function newSlide(Request $req)
    {

        $slide = new SliderModel;

        $slide->title1 = $req->title1;
        $slide->title2 = $req->title2;
        $slide->description = $req->description;
        $slide->button = $req->button;
        $slide->btn_link = $req->link;



        if ($req->file('photo') != null) {
            //Путь к фотографиям

            $destinationPath = 'public/images/slides/';
            // Фото с собакой
            $fileName = rand(1, 10000) . $req->file('photo')->getClientOriginalName();
            $req->file('photo')->move($destinationPath, $fileName);
            $slide->image = $destinationPath . $fileName;
        }
        $slide->save();
        return response()->json('done', 201);
    }

    public function getAllSlides()
    {
        $slides = SliderModel::all();
        return response()->json($slides, 201);
    }

    public function deleteSlide($id){
        $slide = new SliderModel;
        $slide->where('id', $id)->delete();
        return response()->json('done', 201);
    }

}
