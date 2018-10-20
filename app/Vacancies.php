<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    protected $tabel = 'vacancies';

    protected $fillable = ['name' , 'type' , 'available'];
}
