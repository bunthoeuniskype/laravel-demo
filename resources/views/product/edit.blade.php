@extends("layouts.app")

@section("content")


<div class="container">
    <h1>edit Product</h1>
    <form action="/product/{{$data->id}}" method="post">
        <input type="hidden" name="_method" value="put"/>
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label>Title</label> 
                <input class="form-control" name="title" value="{{$data->title}}"/>
            </div>
            <div class="col-md-12">
                <label>Description</label> 
                <textarea class="form-control" name="description" rows="3">{{$data->description}}</textarea>
            </div>
            <div class="col-md-12">
                <label>Price</label> 
                <input type="number" class="form-control" name="price" value="{{$data->price}}"/>
            </div>
            <div class="col-md-12">
                <label>Discount</label>
                <input type="number" class="form-control" name="discount" value="{{$data->discount}}"/>
            </div>
            <div class="col-md-12">
                <label>Status</label>
                <input type="checkbox" name="status" checked="{{$data->status?true:false}}"/>
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection