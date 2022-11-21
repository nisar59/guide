<?php

namespace Modules\Guide\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = ['devices_id','html'];
    protected $table='guide';
    protected static function newFactory()
    {
        return \Modules\Guide\Database\factories\GuideFactory::new();
    }
}
