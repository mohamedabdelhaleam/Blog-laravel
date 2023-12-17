<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = ['title', 'content', 'created_at', 'updated_at', 'category_id', 'user_id'];
    protected $hidden = ['updated_at', 'category_id', 'user_id'];
    public $timestamps = true;


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
