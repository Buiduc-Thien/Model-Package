<?php

namespace ModelsPackage\Laravel\Models;


use Illuminate\Database\Eloquent\Model;

class SizeProduct extends Model
{
    protected $table = 'product_size';

    protected $fillable = [
        'name',
        'product_id',
        'size_id',
    ];



}
