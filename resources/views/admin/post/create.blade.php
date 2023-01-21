@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Add post</h4>
        </div>
        <div class="col-11 m-3 text-center ">

                <form class="col-11" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data" accept="image/*">
                    @csrf
                    @error('content')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('main_img')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group col-11 col-md-5">
                        <input class="form-control form-control-lg m-3" type="text" placeholder="Post name" name="title" required value="{{old('title')}}">
                        <div class="input-group text-light m-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="main_img" accept="image/*" value="{{old('main_img')}}">
                                <label class="custom-file-label" for="exampleInputFile">Choose main file</label>
                            </div>
                        </div>
                        <div class="input-group text-light m-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_img" accept="image/*" value="{{old('preview_img')}}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-11 col-md-5 m-3">
                        <label>Categories</label>
                        <select class="custom-select" name="category_id">
                            <option value="" selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==old('$category_id') ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-11 col-md-5 m-3">
                        <label>Tags</label>
                        <select multiple class="custom-select" name="tag_ids[]">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" {{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}}>{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea  id="summernote" name="content">{{old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary m-3">Create</button>
                    </div>

                </form>
            <div class="col-11 m-3 text-center ">
                <h4>Edit Post</h4>
            </div>
        </div>

    </div>
@endsection
