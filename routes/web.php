<?php


// tasks
Route::get('/', 'TasksController@index'); 
Route::post('/', 'TasksController@store');
Route::patch('/', 'TasksController@patch');

// Route::resource('/', 'TasksController');

// clients
Route::get('clients', 'ClientsController@index');
Route::get('clients/{client}', 'ClientsController@show');
Route::post('/clients/client', 'ClientsController@store');
Route::patch('/clients/client', 'ClientsController@patch');
Route::delete('/clients/{client}', 'ClientsController@destroy');



Route::get("autocomplete",array('as'=>'autocomplete','uses'=> 'TasksController@autocomplete'));
Route::get("autocompleteClient",array('as'=>'autocompleteClient','uses'=> 'TasksController@autocompleteClient'));