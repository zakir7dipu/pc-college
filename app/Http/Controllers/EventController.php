<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $title = "Events";
            $data = Event::orderBy('id', 'DESC')->paginate(10);
            $pageItem = "event";
            return view('backend.pages.page-index', compact('title', 'pageItem', 'data'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $title = "Add New Event";
            $value = null;
            $pageItem = "event";
            return view('backend.pages.form', compact('title', 'value', 'pageItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $event = new Event();
            $event->title = $request->title;
            if ($request->hasFile('photo')){
                $images = $request->photo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . 'DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                }
                Image::make($image->getRealPath())
                    ->resize(800, 445)
                    ->save(public_path('/upload/event/' . $filename));
                $path = "/upload/event/".$filename;
                $event->image = $path;
            }
            $event->description = $request->description;
            $event->button_text = $request->button_text;
            $event->button_url = $request->button_url;
            $event->start_at = date('Y-m-d H:i:s',strtotime($request->start_at));
            $event->save();

            return $this->redirectBackWithSuccess('Saved Successfully','admin.event.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        try {
            $title = "Edit ".$event->title;
            $value = $event;
            $pageItem = "event";
            return view('backend.pages.form', compact('title', 'value', 'pageItem'));
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        try {
            $event->title = $request->title;
            if ($request->hasFile('photo')){
                if ($event->image){
                    $file = $event->image;
                    if (file_exists(public_path($file))) {
                        unlink(public_path($file));
                    }

                }
                $images = $request->photo;
                foreach ($images as $img) {
                    $image = $img;
                    $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
                    $x = str_shuffle($x);
                    $x = substr($x, 0, 6) . 'DAC.';
                    $filename = time() . $x . $image->getClientOriginalExtension();
                }
                Image::make($image->getRealPath())
                    ->resize(800, 445)
                    ->save(public_path('/upload/event/' . $filename));
                $path = "/upload/event/".$filename;
                $event->image = $path;
            }
            $event->description = $request->description;
            $event->button_text = $request->button_text;
            $event->button_url = $request->button_url;
            $event->save();

            return $this->redirectBackWithSuccess('Saved Successfully','admin.event.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try {
            if ($event->image){
                $file = $event->image;
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));
                }
            }
            $event->delete();
            return $this->redirectBackWithSuccess('Deleted Successfully','admin.event.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
