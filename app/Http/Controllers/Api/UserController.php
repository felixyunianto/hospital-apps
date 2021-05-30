<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tour;
use App\Comment;
use Auth;

class UserController extends Controller
{
    public function register(Request $request){
      $this->validate($request,[
        'name' => 'required|min:5',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6'
      ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'api_token' => bcrypt($request->email),
      ]);

      return response()->json([
        'message' => 'success',
        'status' => true,
        'data' => $user
      ], 201);
    }

    public function login(Request $request){

      $credential =[
          'email' => $request->email,
          'password' => $request->password,
      ];

      if(!Auth::guard('web')->attempt($credential, $request->member))
      {
          return response()->json([
              'message' => 'failed',
              'status' => false
          ], 404);
      }
      $user = User::find(Auth::user()->id);
      return response()->json([
          'message' => 'success',
          'status' => true,
          'data' => $user
      ], 200);
    }

    public function comment(Request $request){
      $this->validate($request,[
        'message' => 'required|min:2',
        'tour_id' => 'required'
      ]);

      $tour = Tour::where('id',$request->tour_id)->first();
      $user = User::find(Auth::user()->id);
      if($tour == null){
        return response()->json([
          'message' => 'failed',
          'status' => false
        ], 404);
      }

      $comment = Comment::create([
        'user_id' => $user->id,
        'tour_id' => $request->tour_id,
        'message' => $request->message
      ]);

      return response()->json([
        'message' => 'success',
        'status' => true
      ], 201);

    }
}
