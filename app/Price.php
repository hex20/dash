<?php

namespace app;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Price extends Model implements AuthenticatableContract, AuthorizableContract

{
    use Authenticatable, Authorizable;

    protected $table = 'price';

    protected $fillable = [
        'id',
        'price',
        'time',
        'volume',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [

    ];

}