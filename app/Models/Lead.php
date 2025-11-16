<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'pesantren_name',
        'position',
        'whatsapp_number',
        'email',
        'status',
    ];
    
    /**
     * The default status for new leads
     */
    const DEFAULT_STATUS = 'pending';
    
    /**
     * Available statuses
     */
    const STATUSES = [
        'pending',    // Menunggu
        'process',    // Dalam proses
        'approved',   // Disetujui
        'rejected'    // Ditolak
    ];
    
    /**
     * Set the default status if not provided
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($lead) {
            if (empty($lead->status)) {
                $lead->status = self::DEFAULT_STATUS;
            }
        });
    }
}
