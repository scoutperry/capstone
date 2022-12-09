<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\RatingController;


Route::get('facade-examples', function () {
    var_dump(Hash::make('secret123'));
    var_dump(App::environment());
});
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return response()->json([
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
    ]);
});

# All Projects
Route::get('/projects', [ProjectController::class, 'index']);
# Make sure the create route comes before the `/projects/{slug}` route so it takes precedence
Route::get('/projects/create', [ProjectController::class, 'create']);
# Note the use of the post method in this route
Route::post('/projects', [ProjectController::class, 'store']);
# Individual Project
Route::get('/projects/{slug}', [ProjectController::class, 'show']);
# Show the form to edit a specific book
Route::get('/projects/{slug}/edit', [ProjectController::class, 'edit']);
# Process the form to edit a specific book
Route::put('/projects/{slug}', [ProjectController::class, 'update']);

# All Ratings
Route::get('/ratings', [RatingController::class, 'index']);

/*  These will change the Ratings info such as the 'measure', 'handle', or 'active' properties
Route::get('/ratings/create', [RatingController::class, 'create']);
Route::post('/ratings', [RatingController::class, 'store']);
Route::get('/ratings/{handle}/edit', [RatingController::class, 'edit']);
Route::put('/projects/{slug}', [ProjectController::class, 'update']);
*/

#form to add grades to project found with {slug}
Route::get('/ratings/{slug}/add', [RatingController::class, 'add']);
#persist grades to project found with {slug} to database
Route::post('/ratings/{slug}/save', [RatingController::class, 'save']);
#update grades
Route::put('/ratings/{slug}/update', [RatingController::class, 'update']);

/*
Route::get('/ratings/{handle}', function($handle) {
    return $handle;
    });
Route::get('/ratings/{handle}', [RatingController::class, 'show']);
*/

Route::get('/practice', [PracticeController::class, 'practice21']);

/*
Route::get('/filter/{$slug}/{$department}', function($x, $y) {
    return 'Here are all the projects in the category ' . $x . ' and ' . $y;
});
Route::get('/filter/{category}/{subcategory}', function($x, $y) {
    return 'Here are all the projects in the category ' . $x . ' and ' . $y;
}); 
*/


