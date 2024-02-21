<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    /**
     * Read films from storage
     *
     * @return array
     */
    public function readActors()
    {
        $actors = Actor::select('name', 'surname', 'birthdate', 'country', 'img_url')->get();

        return $actors->toArray();
    }




    /**
     * List ALL movies or filter by year or genre.
     * If both year and genre are not provided, lists all movies.
     * If year or genre is provided, filters movies accordingly.
     *
     * @param int|null $year
     * @param string|null $genre
     * @return \Illuminate\Contracts\View\View
     */
    public function listActors()
    {

        $title = "List of All Actors";
        $actors = ActorController::readActors();

        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }

    public function listActorsByDecade(Request $request)
    {
        $year = $request->input('year');
        $endYear = $year + 9;
        $title = "List of All Actors";
        $actors = DB::table('actors')->select('name', 'surname', 'birthdate', 'country', 'img_url')
            ->whereBetween("birthdate", [$year . '-01-01', ($endYear) . '-12-31'])
            ->get();
        $actors = json_decode(json_encode($actors), true);
        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }

    /**
     * Delete an actor by ID using Query Builder within a transaction.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteActor($id)
    {
        try {
            DB::beginTransaction();

            // Encuentra el actor usando Eloquent
            $actor = Actor::find($id);

            if (!$actor) {
                throw new \Exception("Actor not found");
            }

            // Elimina el actor
            $actor->delete();

            DB::commit();

            return json_encode(['action' => 'delete', 'status' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(['action' => 'delete', 'status' => false, 'error' => $e->getMessage()], 404);
        }
    }




    /**
     * Count the number of movies and display the count.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function countActors()
    {
        $title = "Number of Actors";
        $actorsCount = Actor::count();
    
        return view('actors.count', ["actors" => $actorsCount, "title" => $title]);
    }


    public function getFilms($id)
    {
        try {
            $actor = Actor::findOrFail($id); 
            $films = $actor->films;
    
            return response()->json([
                'actor' => $actor->name . " " . $actor->surname,
                'films' => $films,
                'status' => true
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'error' => 'Actor not found'], 404);
        }
    }
}
