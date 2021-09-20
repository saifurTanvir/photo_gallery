<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $table = 'image';
    protected $primary_key = 'image_id';
    public $timestamps = false;
    protected $guarded = [];

}
