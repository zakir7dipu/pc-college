<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
//        try {
            $title = "Home";
            return view('frontend/pages/welcome', compact('title'));
//        } catch (\Throwable $th) {
//            return $this->backWithError($th->getMessage());
//        }
    }
}
