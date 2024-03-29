<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 use HasFactory;

 protected $guarded = ['id'];

 public function user()
 {
  return $this->belongsTo(User::class);
 }

 public function comments()
 {
  return $this->hasMany(Comment::class);
 }

 public function likes()
 {
  return $this->hasMany(Like::class);
 }

 protected static function boot()
 {
     parent::boot();

     // Postが削除される前に、関連するコメントも削除します
     static::deleting(function ($post) {
         $post->comments()->delete();
         $post->likes()->delete();
     });
 }
}