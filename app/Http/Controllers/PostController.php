<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
 public function index()
 {
  $items = Post::with(['user', 'comments', 'likes'])->get();
  return response()->json([
   'posts' => $items
  ], 200);
 }
 public function store(Request $request)
 {
  $item = Post::create($request->all());
  $post = Post::with(['user', 'comments', 'likes'])->find($item->id);
  return response()->json([
   'post' => $post
  ], 201);
 }
 public function show(Post $post)
 {
  $item = Post::with(['user', 'comments', 'likes', 'comments.user'])->find($post)->first();
  if ($item) {
   return response()->json([
    'post' => $item
   ], 200);
  } else {
   return response()->json([
    'message' => 'Not found',
   ], 404);
  }
 }
 public function destroy(Post $post)
 {
  $item = Post::where('id', $post->id)->delete();
  if ($item) {
   return response()->json([
    'message' => 'Deleted successfully',
   ], 200);
  } else {
   return response()->json([
    'message' => 'Not found',
   ], 404);
  }
 }
}