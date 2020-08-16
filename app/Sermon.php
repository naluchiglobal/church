<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    protected $fillable = ['title', 'video', 'preacher', 'body', 'date'];
}
