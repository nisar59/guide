<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['title','name','url','path','type'];
    protected $table='media';
    
    protected static function newFactory()
    {
        return \Modules\Media\Database\factories\MediaFactory::new();
    }
}
