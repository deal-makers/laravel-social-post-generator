<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freepost extends Model
{
    protected $table = 'freeposts';

    protected $fillable = [
        'title',
        'image',
        'content'
    ];
    
    /**
     * The user of freepost.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
