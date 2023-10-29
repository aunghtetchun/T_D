<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['type', 'label_one', 'label_two', 'label_three', 'created_at'];
}
