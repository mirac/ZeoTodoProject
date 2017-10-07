<?php

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
use App\Task;
use Illuminate\Http\Request;

// Homepage
Route::get('/', function () {
    $tasks = Task::all();

    return View::make('welcome')->with('tasks',$tasks);
});

// get spesific task by id
Route::get('/tasks/{task_id?}',function($task_id){
    $task = Task::find($task_id);

    return Response::json($task);
});

// add new task
Route::post('/tasks',function(Request $request){
    $task = Task::create($request->all());

    return Response::json($task);
});

// update any task
Route::put('/tasks/{task_id?}',function(Request $request,$task_id){
    $task = Task::find($task_id);

    $task->task = $request->task;
    $task->description = $request->description;
    $task->done = $request->done;

    $task->save();

    return Response::json($task);
});

// delete task
Route::delete('/tasks/{task_id?}',function($task_id){
    $task = Task::destroy($task_id);

    return Response::json($task);
});

// update status of task
Route::put('/tasks/{task_id?}/done', function ($task_id) {
    $task = Task::find($task_id);

    $task->done = 1;

    $task->save();

    return "1";
});