<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableTask extends Model
{
    //
    protected $table = 'table_tasks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_task',
        'start_time',
        'end_time',
        'sum_time'
    ];
}
