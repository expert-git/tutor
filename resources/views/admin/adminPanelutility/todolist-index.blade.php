@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Todo List
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">    
          <div class="row">

              <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Todo List</h3>
                        @include('admin.partials.error_section')              
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>

              <div class="box-tools pull-right">
<!--                 <ul class="pagination pagination-sm inline">

                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
               @if(count($todos) > 0)
                  @foreach($todos as $todo)
                      <li class="liTodo" id={{$todo->id}} @if($todo->status == 2) @endif>
                        <!-- drag handle -->
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                        <!-- checkbox -->
                        <input type="checkbox" name="toDoCheck" data-id="{{$todo->id}}" 
                        data-url="{{route('task_status')}}" class="toDoCheck" value="{{$todo->id}}"
                        @if($todo->status == 2) checked @endif>
                        <!-- todo text -->
                        <span class="text" @if($todo->status == 2) style="text-decoration:line-through; color:#c9cbcf;" @endif>{{$todo->task}}</span>
                        <!-- Emphasis label -->
                        <small class="label label-success" @if($todo->status == 2) style="background-color:rgb(201, 203, 207)" @endif><i class="fa fa-clock-o"></i> {{$todo->created_at->diffForHumans()}}</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                          <button data-toggle="modal" class="todoEdit" data-url="{{route('todos.edit', ['id'=> $todo->id])}}" data-id="{{$todo->id}}" data-target="#myModalNormEdit"><i class="fa fa-edit"></i></button>

                          <button class="todoDel" data-url="{{route('todos_delete')}}" data-id="{{$todo->id}}"><i class="fa fa-trash-o"></i></button>

                          
                        </div>
                      </li>
                  @endforeach
                @else
                  No Task Found
                @endif
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"  data-toggle="modal" data-target="#myModalNorm" ><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
                    </div>
                </div>
               </div> 
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Todo List Add modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Add a Todo
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form" id="addTask" action="{{route('todos.store')}}">
                  <div class="form-group">
                    <label for="task">Task</label>
                      <input type="text" class="form-control"
                      id="taskName" name="task" placeholder="Enter your Task"/>
                  </div>                
                
            </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>


<!-- Todo List Edit modal -->
<div class="modal fade" id="myModalNormEdit" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Edit Todo
                </h4>
            </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    
                    <form role="form" id="editTask" action="{{route('todos_update')}}">
                      <div class="form-group">
                        <label for="task">Task</label>
                          <input type="text" class="form-control"
                          id="taskNameEdit" name="taskNameEdit" placeholder="Enter your Task"/>
                          <input type="hidden" name="taskEditId" id="taskEditId" value="">
                      </div>                
                    
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        Edit changes
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection