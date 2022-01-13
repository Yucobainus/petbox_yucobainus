<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addOrder(Request $req){

        $order = new OrderModel;
        $order->height = $req->height;
        $order->arm = $req->arm;
        $order->width = $req->width;
        $order->fullheight = $req->fullheight;

        $order->initials = $req->initials;
        $order->phone = $req->phone;
        $order->mail = $req->mail;
        $order->price = $req->price;
        $order->status = $req->status;

        $order->boxlength = $req->boxlength;
        $order->boxwidth = $req->boxwidth;
        $order->boxheight = $req->boxheight;

        $order->save();

        return response()->json('done', 201);
    }

    public function deleteOrder($id){
        $order = new OrderModel;
        $order->where('id',$id)->delete();
        return response()->json('done', 201);
    }

    public function getAllOrders(){
        $order = new OrderModel();
        return response()->json(['orders', $order->all()]);
    }

    public function changeStatus($id){
        $order = OrderModel::find($id);
        if($order->status == "Новая"){
            $order->status = "Обработана";
        }elseif ($order->status == "Обработана"){
            $order->status = "Закрыта";
        }else {
            $order->status = "Новая";
        }
        $order->save();
        return response()->json(['status', $id]);
    }

}
