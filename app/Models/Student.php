<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'matric',
        'phone',
        'supervisor',
        'session',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function seminar(): HasOne
    {
        return $this->hasOne(Seminar::class);
    }

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }

    public static function findByUuid(string $uuid)
    {
        return self::where('uuid', $uuid)->first();
    }
}
