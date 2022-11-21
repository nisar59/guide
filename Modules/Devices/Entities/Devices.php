<?php

namespace Modules\Devices\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Guide\Entities\Guide;

class Devices extends Model
{
    use HasFactory;

    protected $table='devices';
    protected $fillable = ['name','image','status'];
    
    protected static function newFactory()
    {
        return \Modules\Devices\Database\factories\DevicesFactory::new();
    }

    public function devicesguide()
    {
        return $this->hasOne(Guide::class, 'devices_id');
    }


}
