<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\RecreationEvent;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
//        try {
            $title = "Home";
            $recreations = RecreationEvent::orderBy('id',"DESC")
                ->take(4)
                ->get();
            return view('frontend/pages/welcome', compact('title', 'recreations'));
//        } catch (\Throwable $th) {
//            return $this->backWithError($th->getMessage());
//        }
    }
}
