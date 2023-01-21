@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Edit Category</h4>
        </div>
        <div class="col-11 m-3 text-center ">

                <form class="col-11 col-md-4" action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data" accept="image/*">
                    @csrf
                    @method('patch')
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <input class="form-control form-control-lg m-2" type="text" placeholder="Category name" name="title" value="{{$category->title}}" required>
                    <button type="submit" class="btn btn-primary m-3">Edit</button>
                </form>

        </div>

    </div>
@endsection
