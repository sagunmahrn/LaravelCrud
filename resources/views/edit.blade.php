@extends('layouts')
@section('content')



            <form action="{{route('edit-action')}}" method="post">
                @csrf
                <input type="hidden" name="criteria" value="{{$findData->id}}">
                <div class="form-group form-group-sm">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old('name').@$findData->name}}" placeholder="enter your name">
                    <a href="" style="color: red;">{{$errors->first('name')}}</a>
                </div>
                <div class="form-group form-group-sm">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{old('username').@$findData->username}}" placeholder="enter your username">
                    <a href="" style="color: red;">{{$errors->first('username')}}</a>
                </div>
                <div class="form-group form-group-sm">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{old('email').@$findData->email}}" placeholder="enter your email">
                    <a href="" style="color: red;">{{$errors->first('email')}}</a>
                </div>

                <div class="form-group form-group-sm">
                    <button class="btn btn-primary btn-sm"> Update Record </button>
                </div>

            </form>



@stop