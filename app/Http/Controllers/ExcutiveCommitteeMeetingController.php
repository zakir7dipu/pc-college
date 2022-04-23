<?php

namespace App\Http\Controllers;

use App\Models\ExcutiveCommitteeMeeting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ExcutiveCommitteeMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $title = "Executive Meeting";
            $data = ExcutiveCommitteeMeeting::orderBy('id', 'DESC')->paginate(10);
            $pageItem = "executive-meeting";
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
            $title = "Executive Meeting";
            $value = null;
            $pageItem = "executive-meeting";
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
            $executive_meeting = new ExcutiveCommitteeMeeting();
            $executive_meeting->title = $request->title;
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
                    ->save(public_path('/upload/executive-meeting/' . $filename));
                $path = "/upload/executive-meeting/".$filename;
                $executive_meeting->image = $path;
            }
            $executive_meeting->description = $request->description;
            $executive_meeting->save();

            return $this->redirectBackWithSuccess('Saved Successfully','admin.executive-meeting.index');
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
    public function edit(ExcutiveCommitteeMeeting $executive_meeting)
    {
        try {
            $title = "Edit ".$executive_meeting->title;
            $value = $executive_meeting;
            $pageItem = "executive-meeting";
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
    public function update(Request $request, ExcutiveCommitteeMeeting $executive_meeting)
    {
        try {
            $executive_meeting->title = $request->title;
            if ($request->hasFile('photo')){
                if ($executive_meeting->image){
                    $file = $executive_meeting->image;
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
                    ->save(public_path('/upload/executive-meeting/' . $filename));
                $path = "/upload/executive-meeting/".$filename;
                $executive_meeting->image = $path;
            }
            $executive_meeting->description = $request->description;
            $executive_meeting->save();

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
    public function destroy(ExcutiveCommitteeMeeting $executive_meeting)
    {
        try {
            if ($executive_meeting->image){
                $file = $executive_meeting->image;
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));
                }
            }
            $executive_meeting->delete();
            return $this->redirectBackWithSuccess('Deleted Successfully','admin.executive-meeting.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
