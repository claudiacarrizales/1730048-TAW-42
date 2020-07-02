<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    //
    protected $table = 'departamentos';
    protected $fillable = ['nombre'];
    protected $primaryKey='idD';
}
