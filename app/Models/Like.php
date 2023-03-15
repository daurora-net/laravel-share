<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Like extends Authenticatable
{
 use HasFactory, Notifiable;

 protected $fillable = ['id', 'user_id', 'post_id'];
}