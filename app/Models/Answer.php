<?php

namespace App\Models;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'discussion_id',
        'answer'
    ];

    /**
     * Get the user that owns the Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }
}
