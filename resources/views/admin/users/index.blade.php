@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            Users
        </div>
        <div class="col-2 m-3 text-center">
            <a href="{{route('admin.users.create')}}" class="btn btn-block btn-info">Add</a>
        </div>
        <div class="card-body p-0 m-3 col-11" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap col-md-5">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th colspan="3" class="text-center">Data</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach($users as $user)
                <tr>
                    <td>{{$i}}</td>
                    <td><img src="{{url('storage/'.$user->img)}}" style="width: 20px; height: 20px;"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a class="text-light" href="{{ route('admin.users.show', $user->id) }}"><i class="far fa-eye"></i></a> </td>
                    <td><a class="text-success" href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="post">
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
@endsection
