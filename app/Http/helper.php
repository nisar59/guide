<?php
use Modules\Settings\Entities\Settings;
use App\Models\User;
use Modules\Devices\Entities\Devices;



function AllPermissions()
{
	$role=[];
	$role['users']=['view','add','edit','delete'];
	$role['permissions']=['view','add','edit','delete'];
	$role['media']=['view','add','edit','delete'];
	$role['devices']=['view','add','edit','delete'];
	$role['settings']=['view','add','edit','delete'];


return $role;

}

function FileUpload($img, $path){
	if($img==null){return null;}
	 $imgname=$img->getClientOriginalName();
	  if($img->move($path,$imgname)){
	  	return $imgname;
	  }
	  else{
	  	return null;
	  }
}

function Settings()
{
	return Settings::first();
}


function User($id)
{
	$user=User::find($id);
	if($user!=null){
		return $user->name;
	}
}

function AllDevices()
{
    $devices=Devices::where('status',1)->get();
    return $devices;
}


