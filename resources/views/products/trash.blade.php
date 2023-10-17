@extends('layout.main')
@section('main-section')
<div class="container-fluid">
    <div class="row justify-content-between p-2 bg-light shadow">
        <div class="ml-3`">
            <form class="form-inline my-2 my-lg-0" action="">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" value="{{$search}}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="mr-3">
            <a href="{{url('product/create')}}" class="btn btn-primary">Add Product</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{ $message }}</strong>
</div>
{{-- <div class="alert alert-success" role="alert">
    <strong>{{ $message }}</strong>
</div> --}}

@endif
<div class="container mt-3">
    
    <h1 class="text-primary text-uppercase text-center"> Products</h1>
    
    <table class="table table-striped mt-3 shadow text-center ">
        <thead class="thead-inverse bg-dark text-light">
            <tr>
                <th>S. No.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td>{{$product->name}}</td>
                <td><img src="{{ url('products/' . $product->image) }}" alt="" class="rounded-circle" width="50px" height="50px"></td>
                <td><a href="{{ url('product/' . $product->id) }}/restore" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Restore</a>  <a href="{{ url('product/' .$product->id)}}/force-delete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    {{ $products->appends(['search' => $search])->links() }}
    
    {{-- @if ($products->count() > 5)
        {{ $products->links() }}
        @endif --}}
    </div>
    
    @endsection   
    