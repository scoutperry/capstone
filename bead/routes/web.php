<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PracticeController;


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
# Make sure the create route comes before the `/books/{slug}` route so it takes precedence
Route::get('/projects/create', [ProjectController::class, 'create']);

# All Projects
/*Route::get('/projects', function () {
    # In the future we could query a database for all the projects
    # But for now we'll just return this hypothetical placeholder
    return 'Here are all the projects...';
});*/

Route::get('/projects', [ProjectController::class, 'index']);

# Individual Project

Route::get('/projects/{title}', [ProjectController::class, 'show']);

# Note the use of the post method in this route
Route::post('/projects', [ProjectController::class, 'store']);

Route::get('/rubric', function () {
    return 'Here is your current rubric...';
});
Route::get('/practice', [PracticeController::class, 'practiceX']);



/*
Route::get('/filter/{category}/{subcategory}', function($x, $y) {
    return 'Here are all the books in the category ' . $x . ' and ' . $y;
}); 
*/


