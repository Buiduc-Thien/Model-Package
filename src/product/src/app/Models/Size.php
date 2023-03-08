<?php

namespace ModelsPackage\Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $fillable = [
        'name',
    ];
}
