<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::resource('incoming', IncomingController::class);
//Route::resource('payment', PaymentController::class);
//Route::resource('metatype', 
//	MetaTypeController::class, [
//		'except' => ['update']
//	]
//);

$resources = [
    [
        'name'       => 'metatype',
        'controller' => 'MetaTypeController'   
    ],
    [
        'name'       => 'incoming',
        'controller' => 'IncomingController'   
    ],
    [
        'name'       => 'payment',
        'controller' => 'PaymentController'   
    ],
];

foreach ($resources as $resource) {
    
    $name       = $resource['name'];
    $controller = $resource['controller'];
    
    Route::get("/$name", [
               'as' => "$name.index", 
               'uses' => "$controller@index"
            ]);
    
    Route::get("/$name/{id}", [
               'as' => "$name.show", 
               'uses' => "$controller@show"
            ])->where('id', '[0-9]+');
    
    Route::get("/$name/create", [
                'as' => "$name.create", 
                'uses' => "$controller@create"
            ]);
    Route::post("/$name", [
               'as' => "$name.store", 
               'uses' => "$controller@store"
            ]);
    Route::post("/$name/delete/{id}", [
               'as' => "$name.destroy", 
               'uses' => "$controller@destroy"
            ]);
    Route::post("/$name/{id}", [
               'as' => "$name.edit", 
               'uses' => "$controller@edit"
            ])->where('id', '[0-9]+');
}      
        
