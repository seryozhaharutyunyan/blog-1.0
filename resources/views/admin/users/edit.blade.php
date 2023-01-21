@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Edit user role</h4>
        </div>
        <div class="col-11 m-3 text-center ">

                <form class="col-11 col-md-4" action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    @error('role')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group ">
                        <select class="custom-select form-control-lg ml-3" name="role">
                            <option>Role</option>
                            @foreach($roles as $id=>$role)
                                <option value="{{$id}}" {{$id==$user->role ? 'selected' : ''}}>{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group m-3">
                        <button type="submit" class="btn btn-primary m-3">Create</button>
                    </div>
                </form>

        </div>

    </div>
@endsection
