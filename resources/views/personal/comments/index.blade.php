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
                                <th>Message</th>
                                <th colspan="3" class="text-center">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1?>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$coment->message}}</td>
                                    <td><a class="text-success" href="{{ route('personal.comment.edit', $comment->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                    <td>
                                        <form action="{{ route('personal.comment.delete', $comment->id) }}" method="post">
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
