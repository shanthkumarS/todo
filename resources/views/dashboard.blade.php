<x-app-layout></x-app-layout>
<div class="container">
    <div class="col-10">
        <a href="todo"><button class="btn btn-primary">Todo <b>+</b></button></a>
    </div>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>summary</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(empty($todoList))
                <tr>
                    <td colspan="4" >Empty todo list</td>
                <tr>
            @else
                @foreach($todoList as $todo)
                <tr>
                    <td>{{ $todo->id }}</td>
                    <td>{{ $todo->subject }}</td>
                    <td>{{ Config::get('app.status')[$todo->status] }}</td>
                    <td>{{ $todo->description }}</td>
                    <!-- <td>
                        <a href="todo/edit/{{ $todo->id }}">edit</a>
                        <a href="todo/destroy/{{ $todo->id }}">delete</a>
                    </td> -->
                    <td>
                        <a href="todo/edit/{{ $todo->id }}"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="todo/destroy/{{ $todo->id }}"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
