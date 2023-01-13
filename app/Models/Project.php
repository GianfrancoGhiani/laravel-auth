<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
