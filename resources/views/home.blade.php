@extends('layouts')
@section('content')

    @if(Session('success'))
        <div class="alert alert-success">
            {{Session('success')}}
        </div>
        @endif

    <div class="row">
        <div class ="col-md-4">
            <form action="{{route('add-user')}}" method="post">
                @csrf
                <div class="form-group form-group-sm">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="enter your name">
                    <a href="" style="color: red;">{{$errors->first('name')}}</a>
                </div>
                <div class="form-group form-group-sm">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}" placeholder="enter your username">
                    <a href="" style="color: red;">{{$errors->first('username')}}</a>
                </div>
                <div class="form-group form-group-sm">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="enter your email">
                    <a href="" style="color: red;">{{$errors->first('email')}}</a>
                </div>

                <div class="form-group form-group-sm">
                    <button class="btn btn-primary btn-sm"> Add Record </button>
                </div>

            </form>

        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
            <tbody>
            @foreach($userData as $key=>$users)
                <td>{{++$key}}</td>
                <td>{{$users->name}}</td>
                <td>{{$users->username}}</td>
                <td>{{$users->email}}</td>
                <td>
                    <a href="{{route('edit').'/'.$users->id}}"class="btn btn-info">Edit</a>
                    <a href="{{route('delete').'/'.$users->id}}" class="btn btn-danger ">Delete</a>
                </td>
            </tr>
                @endforeach
            </tbody>
            
            </table>
            {{$userData->render()}}
        </div>
    </div>

@stop