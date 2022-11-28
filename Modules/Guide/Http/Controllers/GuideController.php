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


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $req, $id)
    {
        $media=Media::all();
        $guide=Devices::with('devicesguide')->find($id);
        return view('guide::create')->withGuide($guide)->withMedia($media);
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
            return redirect()->back()->with('success', "Guide saved successfully");
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
