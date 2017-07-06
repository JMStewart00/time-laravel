<?php
Route::get('/', 'TasksController@index'); 
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/{client}', 'ClientsController@show');
Route::post('/clients', 'ClientsController@store');



