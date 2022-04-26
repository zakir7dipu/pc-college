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
    public function __construct()
    {
        Parent::__construct();
    }

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

            return view('frontend/pages/welcome', compact('title', 'recreations', 'executiveMeetings', 'mediaCoverages', 'farewells','blogs'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function recreationEventView(RecreationEvent $recreation_Event)
    {
        try {
            $title = $recreation_Event->title;
            $data = $recreation_Event;
            $dataPrevious = RecreationEvent::where('id',($recreation_Event->id-1))->first();
            $dataNext = RecreationEvent::where('id',($recreation_Event->id+1))->first();
            $dataItem = 'recreation-event';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function executiveMeetingsView(ExcutiveCommitteeMeeting $executive_meetings)
    {
        try {
            $title = $executive_meetings->title;
            $data = $executive_meetings;
            $dataPrevious = ExcutiveCommitteeMeeting::where('id',($executive_meetings->id-1))->first();
            $dataNext = ExcutiveCommitteeMeeting::where('id',($executive_meetings->id+1))->first();
            $dataItem = 'executive-meetings';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function mediaCoverageView(MediaCoverage $media_coverage)
    {
        try {
            $title = $media_coverage->title;
            $data = $media_coverage;
            $dataPrevious = MediaCoverage::where('id',($media_coverage->id-1))->first();
            $dataNext = MediaCoverage::where('id',($media_coverage->id+1))->first();
            $dataItem = 'media-coverage';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function farewellsView(Farewell $farewells)
    {
        try {
            $title = $farewells->title;
            $data = $farewells;
            $dataPrevious = Farewell::where('id',($farewells->id-1))->first();
            $dataNext = Farewell::where('id',($farewells->id+1))->first();
            $dataItem = 'farewells';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function blogView(Blog $blog)
    {
        try {
            $title = $blog->title;
            $data = $blog;
            $dataPrevious = Blog::where('id',($blog->id-1))->first();
            $dataNext = Blog::where('id',($blog->id+1))->first();
            $dataItem = 'blog';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function eventView(Event $event)
    {
        try {
            $title = $event->title;
            $data = $event;
            $dataPrevious = Event::where('id',($event->id-1))->first();
            $dataNext = Event::where('id',($event->id+1))->first();
            $dataItem = 'event';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    public function noticeView(Notice $notice)
    {
        try {
            $title = $notice->title;
            $data = $notice;
            $dataPrevious = Notice::where('id',($notice->id-1))->first();
            $dataNext = Notice::where('id',($notice->id+1))->first();
            $dataItem = 'notice';
            return view('frontend.pages.pages', compact('title',  'data', 'dataPrevious', 'dataNext', 'dataItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
