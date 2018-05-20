<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'summary', 'due_date', 'description'
    ];

    protected $attributes = array(
        'status' => 'Pending'
      );

}
