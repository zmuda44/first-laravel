<?php

use Illuminate\Http\Response;
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
// create new file show.blade which matches tasks.show
// use collect() function to allow you to call methods and then you can use firstWhere()
// in that function he typed abort () with stuff in it and it comes from this code: use Illuminate\Http\Response;  i had to add this though not sure why he didnt
// rendered elemnts on to show.blade using the object notation
// created layouts folder in views and app.blade.php and did html shell
// did @extends in show.blade like import or require?
// did the yields in the app.blade and sections in the show.blade and 
// deelted the html skeleton from index.blade since layout replaces it and did the same with show.blade

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

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];

$notasks = [''];

// can type php artisan tinker and then run the find and get commands in the command line

Route::get('/', function() {
  return redirect()->route('tasks.index');
});

// had ot comment out because you are no longer using the variable tasks Route::get('/tasks', function () use($tasks) {
Route::get('/tasks', function () {
    return view('index', [
        // 'tasks' => $tasks
        //'tasks' => \App\Models\Task::latest()->where('completed', true)->get()
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

// important note: keep in mind it needs to go above the tasks/{id} below, because it thinks create is the id parameter
// if you aren't passing any info to the view you dont need a get method, you can use view. then do the route like normal and the name of the blade as the second parameter
Route::view('/tasks/create', 'create')
->name('tasks.create');

// commented out becaus eno longer using $tasks Route::get('/tasks/{id}', function ($id) use($tasks) {
  Route::get('/tasks/{id}', function ($id) {
  // $task = collect($tasks)->firstWhere('id', $id);

  // if (!$task) {
  //   abort(Response::HTTP_NOT_FOUND);
  // }
  // got rid of these lines when we switched over to a db

  //can also import the Task and use a variable but the array above is a class

  

  // return view('show', ['task' => $task]);
  return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
  
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