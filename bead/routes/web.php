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
Route::get('/projects/{title}', [ProjectController::class, 'show']);

Route::get('/rubric', function () {
    return 'Here is your current rubric...';
});

Route::get('/ratings', [RatingController::class, 'index']);


//Route::get('/ratings', [RatingController::class, 'index']);

/*Route::get('/ratings/{handle}', function($handle) {
    return $handle;
    });*/
//Route::get('/ratings/{handle}', [RatingController::class, 'show']);

Route::get('/practice', [PracticeController::class, 'practice12']);



/*
Route::get('/filter/{category}/{subcategory}', function($x, $y) {
    return 'Here are all the projects in the category ' . $x . ' and ' . $y;
}); 
*/


