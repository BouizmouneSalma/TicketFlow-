<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket'; 

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'software_id',
        'priority',
        'system',
        'screenshot',
        'issue_steps',
        'scenario_description'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function software(): BelongsTo
    {
        return $this->belongsTo(Software::class);
    }

    public function assignments()
{
    return $this->hasMany(Assignment::class);
}
}
