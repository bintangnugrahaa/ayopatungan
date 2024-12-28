<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupParticipant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'booking_trx_id',
        'subscription_group_id',
    ];

    public function subscriptionGroup(): BelongsTo
    {
        return $this->belongsTo(SubscriptionGroup::class, 'subscription_group_id');
    }
}
