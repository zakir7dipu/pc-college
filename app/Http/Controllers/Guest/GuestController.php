<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Event;
use App\Models\ExcutiveCommitteeMeeting;
use App\Models\Farewell;
use App\Models\MediaCoverage;
use App\Models\Notice;
use App\Models\RecreationEvent;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        try {
            $title = "Home";
            $recreations = RecreationEvent::orderBy('id',"DESC")
                ->take(4)
                ->get();
            $executiveMeetings = ExcutiveCommitteeMeeting::orderBy('id',"DESC")
                ->take(4)
                ->get();
            $mediaCoverages = MediaCoverage::orderBy('id',"DESC")
                ->take(4)
                ->get();
            $farewells = Farewell::orderBy('id',"DESC")
                ->take(4)
                ->get();
            $blogs = Blog::orderBy('id',"DESC")
                ->take(9)
                ->get();
            $event = Event::orderBy('id',"DESC")
                ->first();
            $notices = Notice::orderBy('id',"DESC")
                ->take(4)
                ->get();
            return view('frontend/pages/welcome', compact('title', 'recreations', 'executiveMeetings', 'mediaCoverages', 'farewells','blogs', 'event', 'notices'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
