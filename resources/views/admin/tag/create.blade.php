@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Add Tag</h4>
        </div>
        <div class="col-11 m-3 text-center ">

                <form class="col-11 col-md-4" action="{{route('admin.tag.store')}}" method="post">
                    @csrf
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <input class="form-control form-control-lg m-2" type="text" placeholder="Tag name" name="title" required value="{{old('title')}}">
                    <button type="submit" class="btn btn-primary m-3">Create</button>
                </form>

        </div>

    </div>
@endsection
