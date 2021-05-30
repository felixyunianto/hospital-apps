<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth:admin');
  }

  public function index(){
    $users = User::orderBy('id','DESC')->get();
    // dd($users);
    return view('home.user.index', compact('users'));
  }

  public function comment(){
    $comments = Comment::orderBy('id','DESC')->get();
    // dd($users);
    return view('home.user.comment', compact('comments'));
  }
}
