<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
 public function __invoke(Request $request)
 {
  $item = User::create($request->all());
  return response()->json([
   'data' => $item
  ], 201);
 }
}