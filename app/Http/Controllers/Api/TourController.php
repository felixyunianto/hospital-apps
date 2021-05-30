<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
use App\Comment;

class TourController extends Controller
{
  public function index(){
    $tours = Tour::all();
    $result = array();
    foreach ($tours as $tour) {
      $result[] = [
        'id' => $tour->id,
        'name' => $tour->name,
        'category' => $tour->category,
        'image' => $tour->image,
        'longitude' => $tour->longitude,
        'latitude' => $tour->latitude
      ];
    }
    return response()->json([
      'message' => 'Berhasil',
      'status' => true,
      'data' => $result,
    ], 200);
  }

  public function show(Tour $tour){
    $tour->update([
      'read' => $tour->read+1
    ]);
    $comments = Comment::all();
    $results = array();
    foreach ($comments as $comment) {
      $results[] = [
        'user' => $comment->user->name,
        'message' => $comment->message,
        'time' => $comment->created_at->diffForHumans()
      ];
    }
    return response()->json([
      'message' => 'success',
      'status' => true,
      'data' => [
        'id' => $tour->id,
        'name' => $tour->name,
        'category' => $tour->category,
        'address' => $tour->address,
        'region' => $tour->region,
        'price' => $tour->price,
        'description' => $tour->description,
        'read' => $tour->read,
        'image' => $tour->image,
        'longitude' => $tour->longitude,
        'latitude' => $tour->latitude,
        'panorama' => $tour->panoramas,
        'comment' => $results
      ]
    ], 200);
  }

  public function category($category){
    $tours = Tour::where('category',$category)->get();
    $result = array();
    foreach ($tours as $tour) {
      $result[] = [
        'id' => $tour->id,
        'name' => $tour->name,
        'category' => $tour->category,
        'image' => $tour->image,
        'longitude' => $tour->longitude,
        'latitude' => $tour->latitude,
      ];
    }
    return response()->json([
      'status' => true,
      'message' => 'success',
      'data' => $result
    ], 200);
  }

  public function search(Request $request){
    $search = $request->search;

    $tours = Tour::where('name','ILIKE','%'.$search.'%')
            ->orWhere('category','ILIKE','%'.$search.'%')
            // ->orWhere('region','LIKE','%' . strtolower($search) . '%')
            ->get();
          $result = array();
          foreach ($tours as $tour) {
            $result[] = [
              'id' => $tour->id,
              'name' => $tour->name,
              'category' => $tour->category,
              'image' => $tour->image,
              'longitude' => $tour->longitude,
              'latitude' => $tour->latitude,
            ];
          }
    return response()->json([
      'status' => true,
      'message' => 'Success',
      'data' => $result
    ], 200);
  }

  public function popular(){
    $tours = Tour::orderBy('read','DESC')->get();
    $result = array();
    foreach ($tours as $tour) {
      $result[] = [
        'id' => $tour->id,
        'name' => $tour->name,
        'category' => $tour->category,
        'image' => $tour->image,
        'longitude' => $tour->longitude,
        'latitude' => $tour->latitude,
      ];
    }
    return response()->json([
      'message' => 'Berhasil',
      'status' => true,
      'data' => $result,
    ], 200);
  }
}
