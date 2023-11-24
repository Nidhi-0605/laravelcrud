@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="row ">
            <div class="col-sm-8">
                <div class="card mt-3">
                    <h3 class="text-muted">Product Edit #{{ $product->name }}</h3>
                <form action="/products/{{ $product->id }}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$product->name)  }}">
                        @if($errors->has('name'))
                           <span class="text-danger"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" class="form-control">"{{ old('detail',$product->detail)  }}" </textarea>
                        @if($errors->has('detail'))
                           <span class="text-danger"> {{ $errors->first('detail') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                           <span class="text-danger"> {{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>

                </form>
                </div>

                
            </div>
        </div>
    </div>

@endsection