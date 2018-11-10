<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Actor;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class MovieController extends BaseController
{

  public function showAllMovies()
  {
      return response()->json(Movie::with('actors')->get());
  }

  public function showOneMovie($id)
  {
      return response()->json(Movie::with('actors')->find($id));
  }

  public function create(Request $request)
  {
      $this->validate($request, [
          'name' => 'required',
      ]);
      $movie = Movie::create($request->all());
      if ($request["actors"]) {
          foreach (json_decode($request["actors"]) as $actor) {
              $dbActor = Actor::findOrFail($actor);
          }
          $movie->actors()->sync(json_decode($request["actors"]));
      }

      return response()->json($movie, 201);
  }

  public function update($id, Request $request)
  {
      $movie = Movie::findOrFail($id);
      $movie->update($request->all());

      if ($request["actors"]) {
          foreach (json_decode($request["actors"]) as $actor) {
              $dbActor = Actor::findOrFail($actor);
          }
          $movie->actors()->sync(json_decode($request["actors"]));
      }

      return response()->json($movie, 200);
  }

  public function delete($id)
  {
      Movie::findOrFail($id)->delete();
      return response('Deleted Successfully', 200);
  }
}
