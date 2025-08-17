<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "profile_photo",
        "website",
        "github_url",
        "twitter_url",
        "facebook_url",
        "instagram_url",
        "linkedIn_url"
    ];

    # Relationship on User
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
