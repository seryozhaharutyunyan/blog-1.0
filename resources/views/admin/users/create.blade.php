@extends('admin.layouts.admin'),

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->

        <!-- /.content -->
        <div class="col-11 m-3 text-center ">
            <h4>Add user</h4>
        </div>
        <div class="col-11 m-3 text-center ">

                <form class="col-11" action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-11 col-md-5">
                        @error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input class="form-control form-control-lg m-3" type="text" placeholder="Name" name="name" value="{{old('name')}}">
                        @error('surname')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input class="form-control form-control-lg m-3" type="text" placeholder="Surname" name="surname" value="{{old('surname')}}">
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input class="form-control form-control-lg m-3" type="email" placeholder="Email" name="email" value="{{old('email')}}">
                        @error('pone')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input class="form-control form-control-lg m-3" type="text" placeholder="Pone" name="pone" value="{{old('pone')}}" pattern="\+[7]{1}\d{3}\d{3}\d{2}\d{2}">
                        @error('age')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="date" class="form-control form-control-lg m-3" id="reservation" name="age" value="{{old('age')}}">
                        @error('sex')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Sex</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="m">
                                <label class="form-check-label">M</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="g">
                                <label class="form-check-label">G</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group m-3">
                                <div class="custom-file">
                                    <input name="img" type="file" class="form-control-lg custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        @error('role')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group ">
                            <select class="custom-select form-control-lg ml-3" name="role">
                                <option SELECTED>Role</option>
                                @foreach($roles as $id=>$role)
                                    <option value="{{$id}}" {{$id==old('role') ? 'selected' : ''}}>{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group m-3">
                            <button type="submit" class="btn btn-primary m-3">Create</button>
                        </div>
                    </div>
                </form>
        </div>
        <div class="col-11 m-3 text-center ">
            <h4>Add user</h4>
        </div>
    </div>
@endsection
