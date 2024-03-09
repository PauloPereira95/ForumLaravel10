<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplySupport extends Model
{
    use HasFactory,HasUuids;
    // Create Model relations
    protected $table = 'replies_supports';
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function support():BelongsTo {
        return $this->belongsTo(Support::class);
    }
}

