Route::prefix('blog')->name('blog.')->group(function(){
    Route::resource('categories', BlogCategoryController::class);
    Route::prefix('categories')->name('categories.')->group(function(){
        Route::get('status-toggle/{category}', [BlogCategoryController::class, 'statusToggle'])->name('status-toggle');
        Route::get('featured-toggle/{category}', [BlogCategoryController::class, 'featuredToggle'])->name('featured-toggle');
    });

    Route::resource('posts', BlogPostController::class);
    Route::prefix('posts')->name('posts.')->group(function(){
        Route::get('status-toggle/{post}', [BlogPostController::class, 'statusToggle'])->name('status-toggle');
        Route::get('featured-toggle/{post}', [BlogPostController::class, 'featuredToggle'])->name('featured-toggle');
    });

    Route::resource('comments', BlogCommentController::class)->except(['create', 'store']);
});