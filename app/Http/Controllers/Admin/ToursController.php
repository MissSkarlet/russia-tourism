<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToursController extends Controller
{

    public function index() {
        $data = Tour::paginate();
        return view('admin.tours.index', ['data' => $data]);
    }

    public function edit(Tour $tour) {
        $cities = City::all();
        return view('admin.tours.form', ['tour' => $tour, 'cities' => $cities]);
    }

    public function update(Request $request, Tour $tour) {
        $data = $request;
        
        $tour->title = $data->title;
        $tour->description = $data->description;
        $tour->date = $data->date;
        $tour->is_popular = $data->has('is_popular') ?? false;
        $tour->start_city_id = $data->start_city_id;
        $tour->finish_city_id = $data->finish_city_id;

        if ($data->hasFile('image')) {
           $path = $data->image->store('images', 'public');
           $tour->image = $path;
        }

        $tour->save();

        return redirect()->to(route('admin.tour.index'));
    }

    public function create() {
        $cities = City::all();
        return view('admin.tours.form', ['cities' => $cities]);
    }

    public function store(Request $request) {
        $data = $request;

        $tour = new Tour();

        $tour->title = $data->title;
        $tour->description = $data->description;
        $tour->date = $data->date;
        $tour->is_popular = $data->has('is_popular') ?? false;
        $tour->start_city_id = $data->start_city_id;
        $tour->finish_city_id = $data->finish_city_id;

        if ($data->hasFile('image')) {
           $path = $data->image->store('images', 'public');
           $tour->image = $path;
        }

        $tour->save();

        return redirect()->to(route('admin.tour.index'));
    }

    public function destroy(Tour $tour) {
        $tour->delete();
        return redirect()->to(route('admin.tour.index'));
    }
}
