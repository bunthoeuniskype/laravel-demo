@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Edit User Management</h1>
    <form action="/user/{{$user->id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT"/>
        <div class="row">
            <div class="col-md-6">
                <label>Username</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input  type="email"  name="email"  value="{{$user->email}}" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Password (if blank keep the same old password)</label>
                <input type="password" name="password" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Role</label>
                <select class="form-control" name="role">
                    <option>--Role--</option>
                    @foreach($roles as $role)
                    
                        <option value="{{$role->id}}" {{in_array($role->id, $user->roles()->pluck('id')->toArray()) ? 'selected':'' }}>{{$role->name}}</option>
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