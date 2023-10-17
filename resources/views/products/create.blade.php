@extends('layout.main')
@section('main-section')
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
<h1 class="text-primary text-center m-5 text-uppercase">New Product</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="container">
                <div class="card p-3 shadow">
                    <form method="POST" action="{{ url('product/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="name" class="col-sm-1-12 col-form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="">
                                
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="description" class="col-sm-1-12 col-form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="">{{old('description')}}</textarea>
                                @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="image" class="col-sm-1-12 col-form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="" value="{{old('image')}}">
                                @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection