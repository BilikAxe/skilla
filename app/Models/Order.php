<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'partnership_id',
        'user_id',
        'description',
        'date',
        'address',
        'amount',
        'status',
    ];

    public function type(): HasOne
    {
        return $this->hasOne(OrderType::class, 'id', 'type_id');
    }

    public function partnership(): HasOne
    {
        return $this->hasOne(Partnership::class, 'id', 'partnership_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class, 'order_worker', 'order_id', 'worker_id')
            ->withPivot('amount')
            ->withTimestamps();
    }
}
