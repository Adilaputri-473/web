<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['user_id', 'total_points'];

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot('points');
    }
}