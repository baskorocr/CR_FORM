<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'dob',
        'gender',
        'occupation',
        'about',
        'photo',
        'user_id'
    ];

    // Relation One to One
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
