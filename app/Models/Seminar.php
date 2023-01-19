<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seminar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'student_id',
        'seminar_topic',
        'seminar_desc',
        'seminar_file_path',
    ];

    public function seminar(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public static function findByUuid(string $uuid)
    {
        return self::where('uuid', $uuid)->first();
    }
}
