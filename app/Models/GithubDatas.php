<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubDatas extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project',
        'commits_quantities',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function commits_list()
    {
        return $this->belongsTo(GithubCommits::class);
    }
}
