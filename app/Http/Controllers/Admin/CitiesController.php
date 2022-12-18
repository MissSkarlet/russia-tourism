<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{

    public function index() {
        $data = City::paginate();
        return view('admin.cities.index', ['data' => $data]);
    }

    public function edit(City $city) {
        return view('admin.cities.form', ['city' => $city]);
    }

    public function update(Request $request, City $city) {
        $data = $request;
        
        $city->title = $data->title;
        $city->save();

        return redirect()->to(route('admin.city.index'));
    }

    public function create() {
        return view('admin.cities.form');
    }

    public function store(Request $request) {
        $data = $request;

        $city = new City();
        $city->title = $data->title;
        $city->save();

        return redirect()->to(route('admin.city.index'));
    }

    public function destroy(City $city) {
        $city->delete();
        return redirect()->to(route('admin.city.index'));
    }
}
