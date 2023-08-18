<?php

use App\Http\Controllers\FrontEnd\Blogs\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/blog')->group(function(){
    Route::get('/details/{slug}', [BlogController::class, 'singleBlogDetails'])->name('singleBlog.details');
});

?>