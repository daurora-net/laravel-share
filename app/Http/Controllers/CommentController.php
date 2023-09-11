<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function store(Request $request)
  {
      // 必要なデータだけを取得
      $data = $request->only(['user_id', 'post_id', 'comment']);
      
      // データベースに保存
      $item = Comment::create($data);
  
      // 新しく追加されたコメントの詳細を取得
      $comment = Comment::with('user')->find($item->id); // first()を削除
  
      return response()->json([
          'comment' => $comment
      ], 201);
  }

  public function show($id)
  {
    // 指定されたIDのコメントをユーザー情報とともに取得
    $comment = Comment::with('user')->find($id);
    
    // コメントが存在しない場合は、404エラーを返す
    if (!$comment) {
        return response()->json(['message' => 'Comment not found'], 404);
    }

    return response()->json([
        'comment' => $comment
    ]);
  }
}
