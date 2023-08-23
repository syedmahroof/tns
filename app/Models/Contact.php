<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function socialMedia()
    {
        return $this->hasMany(ContactSocialMedia::class);
    }

}

