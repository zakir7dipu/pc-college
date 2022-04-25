<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $title = "Blogs";
            $data = Blog::orderBy('id', 'DESC')->paginate(10);
            $pageItem = "blog";
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
            $title = "Add New Blogs";
            $value = null;
            $pageItem = "blog";
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
            $blog = new Blog();
            $blog->title = $request->title;
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
                $blog->image = $path;
            }
            $blog->description = $request->description;
            $blog->save();

            return $this->redirectBackWithSuccess('Saved Successfully','admin.blog.index');
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
    public function edit(Blog $blog)
    {
        try {
            $title = "Edit ".$blog->title;
            $value = $blog;
            $pageItem = "blog";
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
    public function update(Request $request, Blog $blog)
    {
        try {
            $blog->title = $request->title;
            if ($request->hasFile('photo')){
                if ($blog->image){
                    $file = $blog->image;
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
                $blog->image = $path;
            }
            $blog->description = $request->description;
            $blog->save();

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
    public function destroy(Blog $blog)
    {
        try {
            if ($blog->image){
                $file = $blog->image;
                if (file_exists(public_path($file))) {
                    unlink(public_path($file));
                }
            }
            $blog->delete();
            return $this->redirectBackWithSuccess('Deleted Successfully','admin.blog.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
