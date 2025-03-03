<?php

use Illuminate\Support\Facades\Route;

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

// here is the first thing the video talked about gb
// welcome can be found under views under resources. whatever i change this to will display as the homepage gb
//second thing he showed was how to name routes
// 3rd was route::fallback
// create index.blade.php in resources-views and then return view('index') as homepage
// pass variables as an associative array. render on homepage with {{ $variable-name }}.also use the isset
// copied this task list from his github and made new get route with the function () use ($tasks)
// did if else statement in index.blades.  check this against handlebars. seems similar
// made route to show one single task and added link to index.blade to go to tasks.show route



class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

$notasks = [''];

Route::get('/', function() {
  return redirect()->route('tasks.index');
});



Route::get('/tasks', function () use($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
  return 'one single task';  
})->name('tasks.show');


// Route::get('/', function () {
//     return view('index', [
//         'name' => 'greg',
//         'age' => 'old'
//     ]);
// });

// Route::get('/hello', function () {
//     return "hello";
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//     return 'hello ' . $name . '!';
// });

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::fallback(function () {
//     return 'Still got somewhere';
// });

// php artisan route:list