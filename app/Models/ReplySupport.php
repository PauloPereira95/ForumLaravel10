<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplySupport extends Model
{
    // tablename
    use HasFactory, HasUuids;
    // Create Model relations
    protected $fillable = [
        'user_id',
        'support_id',
        'content'
    ];
    protected $table = 'replies_support';

    // convert date to this format
    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $createdAt) => Carbon::make($createdAt)->format('d/m/Y H:i')
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }
}

