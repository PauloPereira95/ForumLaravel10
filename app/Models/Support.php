<?php

namespace App\Models;

use App\Enums\SupportStatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{

    protected $fillable = [
        'subject',
        'body',
        'status',
    ];
    use HasFactory, HasUuids;

    /*
     * DTO envia o status do tipo SupportStatus (ENUM) ,
     * aqui enviamos para a coluna status apenas o valor (name)
     */
    public function status(): Attribute
    {
        //  MUTATOR / ACESSOR
        return Attribute::make(
            set: fn(SupportStatus $status) => $status->name,

        );
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function replies(): HasMany
    {
        return $this->hasMany(ReplySupport::class);
    }
}
