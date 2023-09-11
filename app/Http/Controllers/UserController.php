<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __invoke(Request $request)
  {
      \Log::info('Request received:', $request->all());  // これを追加
  
      $email = $request->input('email');
      $user = User::where('email', $email)->first();
  
      if (!$user) {
        $user = new User;
        $user->id = $request->input('id'); // FirebaseからのUID
        $user->name = $request->input('name');
        $user->email = $email;
        $user->save();
    }    
  
      return response()->json([
          'data' => $user
      ], 201);
  }
}