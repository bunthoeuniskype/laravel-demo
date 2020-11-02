@extends("layouts.app")

@section("content")


<div class="container">
    <h1>Create Product</h1>
    <form action="/product" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <label>Title</label> 
                <input class="form-control" name="title"/>
            </div>
            <div class="col-md-12">
                <label>Description</label> 
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="col-md-12">
                <label>Price</label> 
                <input type="number" class="form-control" name="price"/>
            </div>
            <div class="col-md-12">
                <label>Discount</label>
                <input type="number" class="form-control" name="discount"/>
            </div>
            <div class="col-md-12">
                <label>Status</label>
                <input type="checkbox" name="status"/>
            </div>
            <div class="col-md-12">
                <label>Image</label>
                <input type="file" name="image"/>
            </div>
            
            <div class="col-md-12">
                <button class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection