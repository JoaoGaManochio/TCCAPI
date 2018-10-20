<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Metodos GET
Route::get('/index', 'UserController@index');
Route::get('/usuario/{id}', 'UserController@getUser');
Route::get('/usuario', 'UserController@allUsers');
Route::get('/verifica-vagas-user/{id}', 'VacanciesController@verificaVagasUser');
Route::get('/verifica-vagas', 'VacanciesController@verificaVagas');

//Metodos POST
Route::post('/cadastrar', 'UserController@save');
Route::post('/login', 'UserController@login');
Route::post('/reservar-vagas/{id}/{id_user}', 'VacanciesController@reservarVagas');
Route::post('/cancelar-vagas/{id}/{id_user}', 'VacanciesController@cancelarVagas');
Route::post('/cadastrar-vagas', 'VacanciesController@cadastrarVagas');

//Metodos DELETE
Route::delete('/delete/{id}', 'UserController@delete');
Route::delete('/remover-vagas/{id}', 'VacanciesController@removerVagas');

//Metodo PUT
Route::put('/update/{id}', 'UserController@update');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*Route::middleware('auth:api')->post('logout', function (Request $request) {
    
    if (auth()->user()) {
        $user = auth()->user();
        $user->api_token = null; // clear api token
        $user->save();

        return response()->json([
            'message' => 'Thank you for using our application',
        ]);
    }
    
    return response()->json([
        'error' => 'Unable to logout user',
        'code' => 401,
    ], 401);
});*/