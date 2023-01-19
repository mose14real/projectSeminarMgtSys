<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
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
        'project_topic',
        'project_desc',
        'project_type',
        'project_members',
        'project_file_path',
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
