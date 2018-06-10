<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{page}', 'PageController@renderPage');
