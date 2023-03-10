<?php

namespace ModelsPackage\Laravel\Models;


use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

class User extends Model
{
    use HasApiTokens;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
    public function tokens()
    {
        return $this->hasMany(PersonalAccessToken::class);
    }

}
