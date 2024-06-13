<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Task;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // 多対多の関係（タスクとカテゴリ）
    public function tasks(){
        return $this->belongsToMany(Task::class);
    }
}
