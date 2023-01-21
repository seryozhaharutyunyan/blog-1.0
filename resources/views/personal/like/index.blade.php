@extends('personal.layouts.personal'),
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="card-body table-responsive p-0 m-3 col-11" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap col-md-5">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Img</th>
                                <th colspan="3" class="text-center">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1?>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$post->title}}</td>
                                    <td><img src="{{url('storage/'.$post->main_img)}}" style="width: 20px; height: 20px;"></td>
                                    <td><a class="text-light" href="{{ route('personal.post.show', $post->id) }}"><i class="far fa-eye"></i></a> </td>
                                    <td><a class="text-success" href="{{ route('personal.post.edit', $post->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                    <td>
                                        <form action="{{ route('personal.like.delete', $post->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="border-0" style="background-color: #454d55">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                <?php $i++?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
