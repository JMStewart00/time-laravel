<?php

// tasks
Route::get('/', 'TasksController@index'); 
Route::post('/', 'TasksController@store');
Route::patch('/', 'TasksController@patch');

// clients
Route::get('clients', 'ClientsController@index');
Route::get('clients/{client}', 'ClientsController@show');
Route::post('/clients', 'ClientsController@store');

Route::get("autocomplete",array('as'=>'autocomplete','uses'=> 'TasksController@autocomplete'));
Route::get("autocompleteClient",array('as'=>'autocompleteClient','uses'=> 'TasksController@autocompleteClient'));