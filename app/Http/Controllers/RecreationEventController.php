<?php

namespace App\Http\Controllers;

use App\Models\RecreationEvent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RecreationEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $title = "Recreation Events";
            $recreationEvents = RecreationEvent::orderBy('id', 'DESC')->paginate(10);
            return view('backend.pages.recreation_event', compact('title', 'recreationEvents'));
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
            $title = "Add New Recreation Event";
            $value = null;
            return view('backend.pages.form', compact('title', 'value'));
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
            $event = new RecreationEvent();
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
                    ->save(public_path('/upload/recreation-event/' . $filename));
                $path = "/upload/recreation-event/".$filename;
                $event->image = $path;
            }
            $event->description = $request->description;
            $event->save();

            return $this->backWithSuccess('Saved Successfully');
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
    public function edit(RecreationEvent $recreation)
    {
        try {
            $title = "Edit ".$recreation->title;
            $value = $recreation;
            return view('backend.pages.form', compact('title', 'value'));
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
    public function update(Request $request, RecreationEvent $recreation)
    {
        try {
            $recreation->title = $request->title;
            if ($request->hasFile('photo')){
                if ($recreation->image){
                    $file = $recreation->image;
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
                    ->save(public_path('/upload/recreation-event/' . $filename));
                $path = "/upload/recreation-event/".$filename;
                $recreation->image = $path;
            }
            $recreation->description = $request->description;
            $recreation->save();

            return $this->backWithSuccess('Updated Successfully');
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
    public function destroy(RecreationEvent $recreation)
    {
        try {
            if ($recreation->image){
                $file = $recreation->image;
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));
                }
            }
            $recreation->delete();
            return $this->redirectBackWithSuccess('Deleted Successfully','admin.recreation.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
