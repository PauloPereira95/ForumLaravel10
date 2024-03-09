<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplySupport extends Model
{
    // tablename
    use HasFactory,HasUuids;
    // Create Model relations
    protected $fillable = [
        'user_id',
        'support_id',
        'content'
    ];
    protected $table = 'replies_support';
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function support():BelongsTo {
        return $this->belongsTo(Support::class);
    }
}

