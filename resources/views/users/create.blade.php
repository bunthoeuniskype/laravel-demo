@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Create User Management</h1>
    <form action="/user" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label>Username</label>
                <input type="text" name="name" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input  type="email"  name="email" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Password</label>
                <input type="password" name="password" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Role</label>
            <select class="form-control" name="role">
                <option>--Role--</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="col-md-6" style="padding-top:15px">  
                <button class="btn btn-primary">Save</button>
            </div>
        </div> 
    </form>
</div>
@endsection