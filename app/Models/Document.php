<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Get the description of the document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function description()
    {
        return $this->morphTo();
    }

    /**
     * Get the user who triggered the document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
