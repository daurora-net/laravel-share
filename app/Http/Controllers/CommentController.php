<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
 public function store(Request $request)
 {
  $item = Comment::create($request->all());
  $comment = Comment::with('user')->find($item)->first();

  return response()->json([
   'comment' => $comment
  ], 201);
 }
}