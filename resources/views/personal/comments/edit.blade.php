@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Edit Category</h4>
        </div>
        <div class="col-11 m-3 text-center ">

                <form class="col-11 col-md-4" action="{{ route('personal.comment.update', $comment->id) }}" method="post" enctype="multipart/form-data" accept="image/*">
                    @csrf
                    @method('patch')
                    @error('message')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <textarea placeholder="Message" name="message" value="{{$comment->message}}" required></textarea>
                    <button type="submit" class="btn btn-primary m-3">Edit</button>
                </form>

        </div>

    </div>
@endsection
