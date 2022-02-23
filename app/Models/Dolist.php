<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dolist extends Model
{
    use HasFactory, SoftDeletes;
    protected $dateFormat = 'U';
    protected $casts = [
        'created_at' => 'int',
        'updated_at' => 'int',
        'deleted_at' => 'int',
        'deadline' => 'int'
    ];
    protected $fillable = [
        'task',
        'deadline',
        'user_id',
    ];

}
