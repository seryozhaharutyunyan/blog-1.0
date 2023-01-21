@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            Category
        </div>
        <div class="col-2 m-3 text-center">
            <a href="{{route('admin.category.create')}}" class="btn btn-block btn-info">Add</a>
        </div>
        <div class="card-body p-0 m-3 col-11" style="height: 300px;">
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
                @foreach($categories as $category)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$category->title}}</td>
                    <td><img src="{{$category->img}}"></td>
                    <td><a class="text-light" href="{{ route('admin.category.show', $category->id) }}"><i class="far fa-eye"></i></a> </td>
                    <td><a class="text-success" href="{{ route('admin.category.edit', $category->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td>
                        <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
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
