<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'status',
        'type_id',
        'git_url',
        'img_url',
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }
}
