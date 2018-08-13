<?php

namespace App\Http\Controllers;

use App\iIMDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use IMDB;

class IIMDBController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('search');
    }

    public function test() {
        $IMDB = new IMDB("Final Destination");
        dd($IMDB->getAll());
        //return view('search');
    }

    public function search(Request $request) {

        if (isset($request->name) && !empty($request->name)) {

            $result = iIMDB::where('title', $request->name)->get()->toArray();

            if (count($result) > 0) {
                $data = [
                    0 => [
                        'movieID' => $result['0']['movieID'],
                        'title' => $result['0']['title'],
                        'release_year' => $result['0']['release_year'],
                        'rating' => $result['0']['rating'],
                        'genre' => $result['0']['genre'],
                        'URL' => $result['0']['URL']
                    ]
                ];
                return view('result')->with('result', $data);
            } else {
                if (isset($request->type) && !empty($request->type)) {
                    $IMDB = new IMDB($request->name, $request->type);
                } else {
                    $IMDB = new IMDB($request->name);
                }


                if ($IMDB->isReady) {
                    $UR = array_filter(explode('/', $IMDB->getUrl()));
                    $data = [
                        0 => [
                            'movieID' => 123,
                            'title' => $IMDB->getTitle($bForceLocal = false),
                            'release_year' => $IMDB->getYear(),
                            'rating' => $IMDB->getRating(),
                            'genre' => $IMDB->getGenre(),
                            'URL' => $IMDB->getPoster($sSize = 'big', $bDownload = false)
                        ]
                    ];

                    DB::table('imdb')->insert($data);
                    //$data->save();

                    return view('result')->with('result', $data);
                } else {
                    echo 'Movie not found. 😞';
                }
            }
        } else if (isset($request->year) && !empty($request->year)) {

            $result = iIMDB::whereBetween('release_year', array($request->year - 1, $request->year + 1))->get()->toArray();
            //dd($result);
            if (count($result) > 0) {
                $dynamic_array = [];
                foreach ($result as $single_result_key => $single_result_value) {
                    $dynamic_array[$single_result_key]['movieID'] = $single_result_value['movieID'];
                    $dynamic_array[$single_result_key]['title'] = $single_result_value['title'];
                    $dynamic_array[$single_result_key]['release_year'] = $single_result_value['release_year'];
                    $dynamic_array[$single_result_key]['rating'] = $single_result_value['rating'];
                    $dynamic_array[$single_result_key]['genre'] = $single_result_value['genre'];
                    $dynamic_array[$single_result_key]['URL'] = $single_result_value['URL'];
                }
                return view('result')->with('result', $dynamic_array);
            } else {
                echo 'Movie not found. 😞';
            }
        } else if (isset($request->rating) && !empty($request->rating)) {

            $result = iIMDB::where('rating', $request->rating)->get()->toArray();

            if (count($result) > 0) {
                $data = [
                    'movieID' => $result['0']['movieID'],
                    'title' => $result['0']['title'],
                    'release_year' => $result['0']['release_year'],
                    'rating' => $result['0']['rating'],
                    'genre' => $result['0']['genre'],
                    'URL' => $result['0']['URL']
                ];
                return view('result')->with('result', $data);
            } else {
                echo 'Movie not found. 😞';
            }
        } else if (isset($request->genre) && !empty($request->genre)) {

            $result = iIMDB::where('genre', 'like', '%' . $request->genre . '%')->get()->toArray();

            if (count($result) > 0) {
                $data = [
                    'movieID' => $result['0']['movieID'],
                    'title' => $result['0']['title'],
                    'release_year' => $result['0']['release_year'],
                    'rating' => $result['0']['rating'],
                    'genre' => $result['0']['genre'],
                    'URL' => $result['0']['URL']
                ];
                return view('result')->with('result', $data);
            } else {
                echo 'Movie not found. 😞';
            }
        } else {
            
        }
    }

    /**
     * Show the form for creating a new comp.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\iIMDB  $iIMDB
     * @return \Illuminate\Http\Response
     */
    public function show(iIMDB $iIMDB) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\iIMDB  $iIMDB
     * @return \Illuminate\Http\Response
     */
    public function edit(iIMDB $iIMDB) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\iIMDB  $iIMDB
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, iIMDB $iIMDB) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iIMDB  $iIMDB
     * @return \Illuminate\Http\Response
     */
    public function destroy(iIMDB $iIMDB) {
        //
    }

}
