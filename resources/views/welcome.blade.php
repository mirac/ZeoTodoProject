<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>ZeoTodoProject - Home</title>

    <!-- Load Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-narrow" style="width: 850px;margin:0 auto">

    <table>
        <tr>
            <td>
                <img src="images/logo.jpg" width="64" height="64" align="left" />
            </td>
            <td>
                <h1>ZeoTodoProject - Welcome!</h1>
            </td>
        </tr>
    </table>
    <br>
    <button id="btn-add" style="background-color: #3d6983" name="btn-add" class="btn btn-primary btn-xs">Add New Task</button>
    <div>

        <!-- Table-to-load-the-data Part -->
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Description</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody id="tasks-list" name="tasks-list">
            @foreach ($tasks as $task)
                <tr id="task{{$task->id}}">
                    <td>{{$task->id}}</td>
                    @if($task->done == 1)
                        <td name="name{{$task->id}}"><del>{{$task->task}}</del></td>
                        <td name="desc{{$task->id}}"><del>{{$task->description}}</del></td>
                        <td name="date{{$task->id}}"><del>{{$task->created_at}}</del></td>
                    @else
                        <td name="name{{$task->id}}">{{$task->task}}</td>
                        <td name="desc{{$task->id}}">{{$task->description}}</td>
                        <td name="date{{$task->id}}">{{$task->created_at}}</td>
                    @endif

                    <td>
                        @if($task->done == 1)
                            <button name="okay{{$task->id}}" class="btn btn-success btn-xs btn-okay okay-task" value="{{$task->id}}">Done!</button>
                        @else
                            <button name="okay{{$task->id}}" class="btn btn-success btn-xs btn-okay okay-task" value="{{$task->id}}">Complete</button>
                        @endif
                        <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$task->id}}">Edit</button>
                        <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$task->id}}">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- End of Table-to-load-the-data Part -->
        <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Task Editor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                            <div class="form-group error">
                                <label for="inputTask" class="col-sm-3 control-label">Task</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="task" name="task" placeholder="Task" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Is done?</label>
                                <div class="col-sm-1">
                                    <input type="checkbox" class="form-control" id="done" name="done">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <input type="hidden" id="task_id" name="task_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/todo-crud.js')}}"></script>
<style type="text/css">
    .strike {
        text-decoration: line-through;
    }
</style>
</body>
</html>