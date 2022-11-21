<?php

namespace Modules\Guide\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Devices\Entities\Devices;
use Modules\Guide\Entities\Guide;
use Modules\Media\Entities\Media;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($id)
    {
        $device=Devices::with('devicesguide')->find($id);

        if($device->devicesguide==null){
            return redirect('devices-guide/'.$id.'/create');
        }

        return view('guide::index')->withDevice($device);
    }

    public function getfile($id)
    {
        $first_portaion='<!DOCTYPE html>
                <html lang="en">
                  <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <meta name="description" content="">
                    <meta name="author" content="">
                    <title>My page</title>
                    <!-- Bootstrap core CSS -->
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
                    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
                    <style>
                        html, body
                        {
                            width:100%;
                            height:100%;
                        }
                    </style>
                  </head>
                  <body>';

        $last_portaion='</body></html>';


        $get_file=Guide::where('devices_id',$id)->first();
        $html='';

        if($get_file!=null){
            $html.=$get_file->html;
        }
        else{
            $html.='
                    <!-- Page Content -->
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 text-center">
                          <h1 class="mt-5">Bootstrap 4 start page</h1>
                          <p class="lead">Start by dragging components to page or double click to edit text</p>
                        </div>
                      </div>
                    </div>
                ';
        }
        
        return $first_portaion.$html.$last_portaion;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $req, $id)
    {
        $media=Media::all();
        return view('guide::create')->withId($id)->withMedia($media);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $req, $id)
    {
        $guide=Guide::firstOrNew(['devices_id'=>$id]);
        $guide->devices_id=$id;
        $guide->html=$req->html;

        if($guide->save()){
            return "File saved successfully";
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('guide::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('guide::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
