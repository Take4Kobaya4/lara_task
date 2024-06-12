<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // 一対多の関係（ユーザーとタスク）
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // 多対多の関係（カテゴリとタスク）
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
