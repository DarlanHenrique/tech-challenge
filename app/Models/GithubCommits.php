<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubCommits extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'github_datas_id',
        'full_date',
        'day',
        'month',
        'year'
    ];
    public function github_datas()
    {
        return $this->hasMany(GithubDatas::class);
    }
}
