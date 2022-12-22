<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Tour;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function tours()
    {
        $tours = Tour::with(['start_city', 'finish_city'])->get();
        return response()->json(compact('tours'));
    }

    public function bid(Request $request)
    {
        $data = json_decode($request->getContent());

        $bid = new Bid();
        $bid->name = $data->name;
        $bid->surname = $data->surname;
        $bid->phone = $data->tel;
        $bid->tour_id = $data->tour_id;
        $bid->save();

        return response()->json(['status' => 'OK']);
    }
}
