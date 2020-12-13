@extends("layouts.app")

@section("content")
<div class="container">
    <h1>List User Management</h1>
    @if(Entrust::can("create-user"))
     <a href="/user/create" class="btn btn-primary" style="float:right">Create</a>
    @endif
    <table class="table table-borderd">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th style="width:10%">Action</th>
        </tr>
        @foreach($data as $key => $value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{implode("; ", $value->roles()->pluck("name")->toArray())}}</td>
                <td>
                    <div class="row">
                        @if(Entrust::can("edit-user"))
                        <div class="col-md-6">
                            <a class="btn btn-info" href="/user/{{$value->id}}/edit">Edit</a> 
                        </div>
                        @endif
                        @if(Entrust::can("delete-user"))
                        <div class="col-md-6">
                            <form action="/user/{{$value->id}}" method="POST">
                                @csrf 
                                <input type="hidden" name="_method" value="delete"/>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
        
                   
                  
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection