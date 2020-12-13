@extends ("layouts.app")


@section("content")
<div class="container">
    <h1>List Roles</h1>
    @if(Entrust::can("create-role"))
        <a href="/role/create" class="btn btn-primary" style="float:right">Create</a>
    @endif
    <table class="table table-borderd">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Display Name</th>
            <th>Description</th>
            <th style="width:15%">Action</th>
        </tr>
        @foreach($data as $key => $value)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->display_name}}</td>
            <td>{{$value->description}}</td>
            <td>
                <div class="row">
                    <div class="col-md-6">
                        @if(Entrust::can("create-role"))
                            <a href="/role/{{$value->id}}/edit" class="btn btn-info">Edit</a>
                        @endif
                    </div>
                    <div class="col-md-6">
                        @if(Entrust::can("delete-role"))
                            <form action="/role/{{$value->id}}" method="post">
                                @csrf 
                                <input type="hidden" name="_method" value="delete">
                                <biutton class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection