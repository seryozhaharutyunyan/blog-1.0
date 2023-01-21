@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            Post: {{$post->title}}
        </div>

        <div class="card-body table-responsive p-0 m-3 col-10" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap col-md-5">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Img</th>
                    <th colspan="2" class="text-center">Data</th>
                </tr>
                </thead>
                <tbody>
                     <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                         <td><img src="{{url('storage/'.$post->main_img)}}" style="width: 20px; height: 20px;"></td>
                         <td><a class="text-success" href="{{ route('admin.post.edit', $post->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                         <td>
                             <form action="{{ route('admin.post.delete', $post->id) }}" method="post">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" class="border-0" style="background-color: #454d55">
                                     <i class="fas fa-trash text-danger"></i>
                                 </button>

                             </form>
                         </td>
                    </tr>

                </tbody>
            </table>
        </div>


    </div>
@endsection
