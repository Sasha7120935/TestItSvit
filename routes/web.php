<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    $beers = \App\Beer::orderBy('created_at','asc')->get();
    return view('beers',[
        'beers'=> $beers
        ]
    );
});
Route::post('/beer', function (Request $request) {
    $validator = Validator::make($request->all(),[
        'name' => 'required|max:25'
    ]);
    if($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $beer = new \App\Beer;
    $beer ->name = $request->name;
    $beer->save();

    return redirect('/');
});
Route::delete('/beer/{beer}', function (\App\Beer $beer) {
    $beer->delete();

    return redirect('/');
});
//Route::get('/', function () {
//    $beer_producers = \App\Beer_Producer::orderBy('created_at','asc')->get();
//    return view('beer_producers',[
//            'beer_producers'=> $beer_producers
//        ]
//    );
//});
//Route::post('/beer_producers', function (Request $request) {
//    $validator = Validator::make($request->all(),[
//        'name' => 'required|max:25'
//    ]);
//    if($validator->fails()){
//        return redirect('/')
//            ->withInput()
//            ->withErrors($validator);
//    }
//
//    $beer_producer = new \App\Beer_Producer();
//    $beer_producer ->name = $request->name;
//    $beer_producer->save();
//
//    return redirect('/');
//});
//Route::delete('/beer_producer/{beer_producer}', function (\App\Beer_Producer $beer_Producer) {
//    $beer_Producer->delete();
//
//    return redirect('/');
//});


