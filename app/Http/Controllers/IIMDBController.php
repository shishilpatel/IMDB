<?php

namespace App\Http\Controllers;

use App\Http\Resources\Movie;
use App\iIMDB;
use Illuminate\Http\Request;
use IMDB;
use Illuminate\Support\Facades\DB;

class IIMDBController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $movie = iIMDB::all();
        return Movie::collection($movie);
    }

    public function searchByTitle($title)
    {
        //dd($title);
        $result = iIMDB::where('title', $title)->get();

        if (count($result) > 0) {
            return Movie::collection($result);
        } else {
            $IMDB = new IMDB($title);

            if ($IMDB->isReady) {
                $UR = array_filter(explode('/', $IMDB->getUrl()));

                $data = [
                    'movieID' => $UR[4],
                    'title' => $IMDB->getTitle($bForceLocal = false),
                    'release_year' => $IMDB->getYear(),
                    'rating' => $IMDB->getRating(),
                    'genre' => $IMDB->getGenre(),
                    'URL' => $IMDB->getPoster($sSize = 'big', $bDownload = false)
                ];

                DB::table('imdb')->insert($data);

                $result = iIMDB::where('title', $title)->get();

                return Movie::collection($result);
            } else {
                echo 'Movie not found. 😞';
            }
        }
    }

    public function searchByYear($year)
    {
        $result = iIMDB::whereBetween('release_year', array($year - 1, $year + 1))->get();

        if (count($result) > 0) {
            return Movie::collection($result);
        } else {
            echo 'Movie not found. 😞';
        }
    }

    public function searchByRating($rating)
    {
        $result = iIMDB::where('rating', $rating)->get();

        if (count($result) > 0) {
            return Movie::collection($result);
        } else {
            echo 'Movie not found. 😞';
        }
    }

    public function searchByGenre($genre)
    {
        $result = iIMDB::where('genre', 'like', '%' . $genre . '%')->get();

        if (count($result) > 0) {
            return Movie::collection($result);
        } else {
            echo 'Movie not found. 😞';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\iIMDB $iIMDB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, iIMDB $iIMDB)
    {
        if (isset($request->rating)) {
            $result = $request->isMethod('put') ? iIMDB::where('title', $request->title)->first() : new iIMDB;
            //dd($result);
            $result->rating = $request->rating;
            $result->save();
        }
        if (isset($request->genre)) {
            $result = $request->isMethod('put') ? iIMDB::where('title', $request->title)->first() : new iIMDB;
            $result->genre = $result->genre . " / " . $request->genre;
            $result->save();
        }
    }
}
