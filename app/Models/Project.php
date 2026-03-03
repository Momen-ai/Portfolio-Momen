<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'github_url',
        'demo_url',
        'is_featured',
        'status'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (!$project->slug) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}

