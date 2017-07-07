<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Model extends Eloquent
{
  protected $fillable = ['task_name', 'client_id', 'rate'];
}
