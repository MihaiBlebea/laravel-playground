<?php

use Illuminate\Http\Request;
use App\Models\Content;


Route::post('/v1/store/content/{content}', function(Request $request, Content $content) {
    $content->update([
        'content' => $request->input('content')
    ]);
    return $content;
});

Route::post('/v1/store/image', function(Request $request) {
    $path = $request->file('image-upload')->store('avatars');
    return $path;
});
