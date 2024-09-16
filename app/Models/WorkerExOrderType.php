<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerExOrderType extends Model
{
    use HasFactory;

    protected $table = 'workers_ex_order_types';
    protected $fillable = [
        'worker_id',
        'order_type_id'
    ];
}
