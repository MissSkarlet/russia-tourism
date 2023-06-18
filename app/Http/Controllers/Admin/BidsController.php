<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;

class BidsController extends Controller
{
    public function index() {
        $data = Bid::paginate();
        return view('admin.bids.index', ['data' => $data]);
    }

    public function show(Bid $bid) {
        return view('admin.bids.show', ['bid' => $bid]);
    }

    public function process(Bid $bid) {
        $bid->is_processed = !$bid->is_processed;
        $bid->save();
        return redirect()->to(route('admin.bid.index'));
    }

    public function destroy(Bid $bid) {
        $bid->delete();
        return redirect()->back();
    }
}
