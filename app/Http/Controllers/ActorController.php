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
        // Utilizamos el Query Builder para realizar la consulta
        $actors = DB::table('actors')->select('name', 'surname', 'birthdate', 'country', 'img_url')->get();
        // Retornamos los resultados
        return json_decode(json_encode($actors), true);
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

            $deleted = DB::table('actors')->where('id', $id)->delete();

            if (!$deleted) {
                throw new \Exception("Actor not found or couldn't be deleted");
            }

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
        $actors = ActorController::readActors();

        $actors = count($actors);

        return view('actors.count', ["actors" => $actors, "title" => $title]);
    }


    public function getFilms($id)
    {
        $actor = Actor::find($id);
        if ($actor) {
            $nombre = $actor->name;
            $apellido = $actor->surname;
            $films_actor = $actor->films->toArray();
        return json_encode(['actor'=>$nombre . " " . $apellido,'films' => $films_actor, 'status' => true]);

        } else {
            return json_encode(['status' => 404, 'error' => 'Actor not found'], 404);

        }


        
    }
}
