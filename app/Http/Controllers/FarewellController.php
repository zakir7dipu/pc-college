<?php

namespace App\Http\Controllers;

use App\Models\Farewell;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FarewellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $title = "farewell";
            $data = Farewell::orderBy('id', 'DESC')->paginate(10);
            $pageItem = "farewell";
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
            $title = "Add New Farewell";
            $value = null;
            $pageItem = "farewell";
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
            $farewell = new Farewell();
            $farewell->title = $request->title;
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
                    ->save(public_path('/upload/farewell/' . $filename));
                $path = "/upload/farewell/".$filename;
                $farewell->image = $path;
            }
            $farewell->description = $request->description;
            $farewell->save();

            return $this->redirectBackWithSuccess('Saved Successfully','admin.farewell.index');
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
    public function edit(Farewell $farewell)
    {
        try {
            $title = "Edit ".$farewell->title;
            $value = $farewell;
            $pageItem = "farewell";
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
    public function update(Request $request, Farewell $farewell)
    {
        try {
            $farewell->title = $request->title;
            if ($request->hasFile('photo')){
                if ($farewell->image){
                    $file = $farewell->image;
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
                    ->save(public_path('/upload/farewell/' . $filename));
                $path = "/upload/farewell/".$filename;
                $farewell->image = $path;
            }
            $farewell->description = $request->description;
            $farewell->save();

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
    public function destroy(Farewell $farewell)
    {
        try {
            if ($farewell->image){
                $file = $farewell->image;
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));
                }
            }
            $farewell->delete();
            return $this->redirectBackWithSuccess('Deleted Successfully','admin.farewell.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
