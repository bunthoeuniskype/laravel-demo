@extends("layouts.app")

@section("content")
<h1>List Products</h1>
<a  class="btn btn-primary pull-right" style="float:right" href="/product/create">Create Product</a>
<table class="table table-bordered">
<thead>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>description</th>
        <th>price</th>
        <th>discount</th>
        <th>status</th>
        <th>action</th>
    </tr>
</thead>
<tbody>
@if(count($data) > 0)
    @foreach($data as $key => $value)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->description}}</td>
            <td>{{$value->price}}</td>
            <td>{{$value->discount}}</td>
            <td>{{$value->status?"Show":"Hidden"}}</td>
            <td style="white-space:nowrap;">
                <a class="btn btn-xs btn-info" href="/product/{{$value->id}}/edit">Edit</a>
                <form action="/product/{{$value->id}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete"/>
                    <button class="btn btn-xs btn-danger" style="float:right">delete</button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6">No Products</td>
    </tr>
@endif
</tbody>


</table>
@endsection
