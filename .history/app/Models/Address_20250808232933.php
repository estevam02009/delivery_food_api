<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street',
        'city',
        'state',
        'zip_code',
        'is_primary',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
