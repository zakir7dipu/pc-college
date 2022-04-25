<?php

namespace App\Http\Controllers;

use App\Models\MediaCoverage;
use Illuminate\Http\Request;

class MediaCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $title = "Media Coverage";
            $data = MediaCoverage::orderBy('id', 'DESC')->paginate(10);
            $pageItem = "media-coverage";
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
            $title = "Add New Media Coverage";
            $value = null;
            $pageItem = "media-coverage";
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
            $media_coverage = new MediaCoverage();
            $media_coverage->title = $request->title;
            $media_coverage->description = $request->description;
            $media_coverage->save();
            return $this->redirectBackWithSuccess('Saved Successfully','admin.media-coverage.index');
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
    public function edit(MediaCoverage $media_coverage)
    {
        try {
            $title = "Edit ".$media_coverage->title;
            $value = $media_coverage;
            $pageItem = "media-coverage";
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
    public function update(Request $request, MediaCoverage $media_coverage)
    {
        try {
            $media_coverage->title = $request->title;
            $media_coverage->description = $request->description;
            $media_coverage->save();
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
    public function destroy(MediaCoverage $media_coverage)
    {
        try {
            $media_coverage->delete();
            return $this->redirectBackWithSuccess('Deleted Successfully','admin.media-coverage.index');
        } catch (\Throwable $th) {
            return $this->backWithError($th->getMessage());
        }
    }
}
