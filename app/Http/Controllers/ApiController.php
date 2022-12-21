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
        $bid = new Bid();
        $bid->name = $request->name;
        $bid->surname = $request->surname;
        $bid->tour_id = $request->tour_id;
        $bid->save();

        return response()->json(['status' => 'OK']);
    }
}
