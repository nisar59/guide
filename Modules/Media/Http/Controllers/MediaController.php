<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Media\Entities\Media;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use Storage;
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (request()->ajax()) {
        $media=Media::orderBy('id','ASC')->get();
            return DataTables::of($media)
                ->addColumn('action', function ($row) {
                    $action='';
                if(Auth::user()->can('media.delete')){
                $action.='<a class="btn btn-danger btn-sm" href="'.url('media/destroy/'.$row->id).'"><i class="fas fa-trash-alt"></i></a>';
                    }
                
                return $action;
                })

                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })                
                ->addColumn('url', function ($row) {
                $guide='';
                $guide.='

                <a class="btn btn-primary btn-sm" title="Click to view" href="'.$row->url.'" target="_blank"><i class="fas fa-mars"></i></a>
                <a class="btn btn-primary btn-sm copy" data-copy="'.$row->url.'" title="Copy text" href="javascript:void(0)"><i class="fas fa-copy"></i></a>';
                
                return $guide;
                })
                ->rawColumns(['action','url'])
                ->make(true);
        }
        return view('media::index');
    }


    public function scan()
    {

        $scandir=public_path('media');
        $scan = function ($dir) use ($scandir, &$scan) {
            $file_types=["jpg","pdf","jpeg","gif","png"];
            $files = [];
            if (file_exists($dir)) {
                foreach (scandir($dir) as $f) {
                    $file_type = pathinfo($f, PATHINFO_EXTENSION);
                    if (! $f || $f[0] == '.' || !in_array($file_type, $file_types)) {
                        continue; // Ignore hidden files
                    }

                    if (is_dir($dir . '/' . $f)) {
                        $files[] = [
                            'name'  => $f,
                            'type'  => 'folder',
                            'path'  => str_replace($scandir, '', $dir) . '/' . $f,
                            'items' => $scan($dir . '/' . $f), // Recursively get the contents of the folder
                        ];
                    } else {

                        $files[] = [
                            'name' => $f,
                            'type' => 'file',
                            'path' => str_replace($scandir, '', $dir) . '/' . $f,
                            'size' => filesize($dir . '/' . $f), // Gets the size of this file
                        ];
                    }


                }
            }

            return $files;
        };

        $response = $scan(public_path('media'));



        return response()->json([
    'name'  => '',
    'type'  => 'folder',
    'path'  => '',
    'items' => $response,
]);



    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('media::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $req)
    {
        $req->validate([
            'file' => ['required'],
        ]);
        $path=public_path('media');
        $type='video';
        $file_type=["jpg","pdf","jpeg","gif","png"];
        $extenion=$req->file->getClientOriginalExtension();
        $name=FileUpload($req->file('file'), $path);
        $url=url('public/media/'.$name);
        $media_path=$path.'/'.$name;

       if(in_array($extenion, $file_type)){
        $type='image';
       }

      $media= Media::create([
        'title'=>$req->title,
        'name'=>$name,
        'url'=>$url,
        'path'=>$media_path,
        'type'=>$type
       ]);
        if($media){
            if($req->ajax()){

                return $media->name;
            }

            return redirect('media')->with('success', 'Media successfully created');
        }  
        else{
            return redirect('media')->with('error', 'Something went wrong');
        } 

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('media::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('media::edit');
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
        $media=Media::find($id);
        unlink($media->path);
        if($media->delete()){
            return redirect('media')->with('success', 'Media successfully deleted');
        }  
        else{
            return redirect('media')->with('error', 'Something went wrong');
        } 

    }
}
