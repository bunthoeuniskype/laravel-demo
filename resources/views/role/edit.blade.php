@extends ("layouts.app")


@section("content")
<div class="container">
    <h1>Edit Roles</h1>

    <form action="/role/{{$role->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put"/>
        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
                <input type="text" name="name" value="{{$role->name}}" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>Display name</label>
                <input type="text" name="display_name" value="{{$role->display_name}}" class="form-control"/>
            </div>
            <div class="col-md-6">
                <label>description</label>
                <textarea rows="3" class="form-control" name="description"> {{$role->display_name}} </textarea>
            </div>

            <div class="col-md-12">
                <label>Permssions</label>

                @foreach($permissions as $val)
                    <div class="col-12">
                        <input type="checkbox" name="permissions[]" id="$val->name" value="{{$val->id}}" {{in_array($val->id, $role->permissions()->pluck("id")->toArray()) ? 'checked' : ''}}/>
                        <label for="{{$val->name}}"> {{$val->display_name}}</label>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection