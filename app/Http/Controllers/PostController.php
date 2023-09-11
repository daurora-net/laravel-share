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
  $data = $request->only(['user_id', 'content']);  // user_idとcontentを取得

  // データベースに保存
  $item = Post::create($data);

  // 新しいポストの詳細を取得
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
     if ($post->delete()) {
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