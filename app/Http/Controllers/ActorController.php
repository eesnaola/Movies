<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Actor;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ActorController extends BaseController
{

  public function showAllActors()
  {
      return response()->json(Actor::with('movies')->get());
  }

  public function showOneActor($id)
  {
      return response()->json(Actor::with('movies')->find($id));
  }

  public function create(Request $request)
  {
      $this->validate($request, [
          'name' => 'required',
      ]);
      $actor = Actor::create($request->all());
      if ($request["movies"]) {
          foreach (json_decode($request["movies"]) as $movie) {
              $dbMovie = Actor::findOrFail($actor);
          }
          $actor->movies()->sync(json_decode($request["movies"]));
      }

      return response()->json($actor, 201);
  }

  public function update($id, Request $request)
  {
      $actor = Actor::findOrFail($id);
      $actor->update($request->all());

      if ($request["movies"]) {
          foreach (json_decode($request["movies"]) as $movie) {
              $dbMovie = Actor::findOrFail($actor);
          }
          $actor->movies()->sync(json_decode($request["movies"]));
      }

      return response()->json($actor, 200);
  }

  public function delete($id)
  {
      Actor::findOrFail($id)->delete();
      return response('Deleted Successfully', 200);
  }
}
