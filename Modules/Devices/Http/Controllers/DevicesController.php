<?php

namespace Modules\Devices\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Devices\Entities\Devices;
use Yajra\DataTables\Facades\DataTables;
use Auth;
class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (request()->ajax()) {
        $devices=Devices::orderBy('id','ASC')->get();
            return DataTables::of($devices)
                ->addColumn('action', function ($row) {
                    $action='';
                if(Auth::user()->can('devices.edit')){
                $action.='<a class="btn btn-primary btn-sm" href="'.url('devices/edit/'.$row->id).'"><i class="fas fa-pencil-alt"></i></a>';
                }
                if(Auth::user()->can('devices.delete')){
                $action.='<a class="btn btn-danger btn-sm" href="'.url('devices/destroy/'.$row->id).'"><i class="fas fa-trash-alt"></i></a>';
                    }
                
                return $action;
                })
                ->editColumn('image', function ($row) {

                    $image_name=$row->image;
                    $image_path=public_path('img/devices/'.$image_name);
                    if(file_exists($image_path) AND $image_name!=''){
                    $image_path=url('public/img/devices/'.$image_name);
                    }
                    else{
                    $image_path=url('public/img/images.png');
                    }

                return '<img src="'.$image_path.'" class="image-display" id="image-display" width="50" height="50">';
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })

                ->addColumn('status', function ($row) {
                    $status='';
                if($row->status==1){
                $status.='<a class="btn btn-success btn-sm" href="'.url('devices/status/'.$row->id).'">Active</a>';
                }
                else{
                $status.='<a class="btn btn-danger btn-sm" href="'.url('devices/status/'.$row->id).'">Deactive</a>';
                    }
                
                return $status;
                })
                ->addColumn('guide', function ($row) {
                $guide='';
                $guide.='<a class="btn btn-primary btn-sm" href="'.url('devices-guide/'.$row->id).'"><i class="fas fas fa-arrow-right"></i></a>';
                
                return $guide;
                })
                ->rawColumns(['image','status','action','guide'])
                ->make(true);
        }



        return view('devices::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('devices::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $path=public_path('img/devices');

        $device=Devices::create([
            'name' => $req->name,
            'image'=>FileUpload($req->file('image'), $path)
        ]);
        if($device){
            return redirect('devices')->with('success', 'Device successfully created');
        }  
        else{
            return redirect('devices')->with('error', 'Something went wrong');
        }  
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('devices::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->data['device']=Devices::find($id);
        return view('devices::edit')->withData($this->data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $path=public_path('img/devices');

        $device=Devices::find($id);

        $device->name=$req->name;

        if($req->hasFile('image')){
            $device->image=FileUpload($req->file('image'), $path);
        }

        if($device->save()){
            return redirect('devices')->with('success', 'Device successfully updated');
        }    
        else{
            return redirect('devices')->with('error', 'Something went wrong');
        }
    }

    /**
     * Update Status of the specified resource.
     * @param int $id
     * @return Redirect
     */
    public function status($id)
    {
        $device=Devices::find($id);

        if($device->status==1){
            $device->status=0;
        }
        else{
            $device->status=1;
        }

        if($device->save()){
            return redirect('devices')->with('success', 'Device status successfully updated');
        }
        else{
            return redirect('devices')->with('error', 'Something went wrong');
        }
    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(Devices::find($id)->delete()){
            return redirect('devices')->with('success', 'Device successfully deleted');
        }
        else{
            return redirect('devices')->with('error', 'Something went wrong');
        }
    }
}
