<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
     protected $fillable = [
        'user_id',
        'email',
        'otp_code',
        'expires_at',
        'used_at'
    ];
    
    protected $dates = [
        'expires_at',
        'used_at'
    ];
    
    /**
     * Get the user that owns the OTP.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
