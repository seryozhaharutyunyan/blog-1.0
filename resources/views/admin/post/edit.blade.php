@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Edit Post</h4>
        </div>
        <div class="col-11 m-3 text-center ">

            <form class="col-11" action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data" accept-charset="image/*">
                @csrf
                @method('patch')
                <div class="form-group col-11 col-md-4">
                    @error('content')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('category_id')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <input class="form-control form-control-lg m-3" type="text" placeholder="Post name" name="title"
                           value="{{$post->title}}" required>
                    <div class="col-11 form-group m-3"  >
                        <img src="{{url('storage/'.$post->main_img)}}"  alt="main_img" class="w-100 h-50">
                    </div>
                    <div class="input-group text-light m-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="main_img" accept="image/*">
                            <label class="custom-file-label" for="exampleInputFile">Choose main file</label>
                        </div>
                    </div>
                    @if($post->preview_img)
                        <div class="col-11 form-group">
                            <img src="{{url('storage/'.$post->preview_img)}}"  alt="preview_img" class="w-50 h-50">
                        </div>
                    @endif
                    <div class="input-group text-light m-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_img" accept="image/*">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-11 col-md-4 m-3">
                    <label>Categories</label>
                    <select class="custom-select" name="category_id">
                        <option value="">Category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{$category->id===$post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-11 col-md-5 m-3">
                    <label>Tags</label>
                    <select multiple class="custom-select" name="tag_ids[]">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}" {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}}>{{$tag->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <textarea id="summernote" name="content" placeholder="content"
                              required>{{$post->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary m-3">Edit</button>
            </form>
            <div class="col-11 m-3 text-center ">
                <h4>Edit Post</h4>
            </div>
        </div>

    </div>
@endsection
