@extends('layouts.admin')



@section('content')
    <h1>تغییر مشخصات کاربر {{ $user->name }}</h1>
    <br>
    <br>
    {{--{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}--}}
    {{--<div class="form-group">--}}
    {{--{!!Form::label('title', 'نام:')!!}--}}
    {{--{!! Form::text('title', null, ['class'=>'form-control']) !!}--}}

    {{--</div>--}}
    {{--<div class="form-group">--}}

    {{--{!! Form::submit('Create user', ['class'=>'btn btn-primary']) !!}--}}
    {{--</div>--}}



    {{--{!! Form::close()!!}--}}

    <div class="col-sm-9">
    <form action="{{ action('AdminUsersController@update' , $user->id) }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">

            <label for="name"><span>نام کابر</span></label>
            <input name="name" type="text" class="text-left input-lg" value="{{$user->name}}">

        </div>

        <div class="form-group">

            <label for="password"><span>پسورد</span></label>
            <input name="password" type="password" class="text-left input-lg" id="pwd">

        </div>
        <div class="form-group">

            <label for="email"><span>ایمیل</span></label>
            <input name="email" type="email" value="{{$user->email}}" class="text-left input-lg">

        </div>

        <div class="form-group">

            <label for="photo_id"><span>تصویر</span></label>
            <input name="photo_id" type="file" class="text-left input-lg">

        </div>

        <div class="form-group">

            <label for="role_id" class="text-right"><span>نقش</span></label>
            {{--<select name="role_id[]" class="form-group input-lg" multiple>--}}
            <select name="role_id" size="2" class="form-group input-lg" multiple>

                <option value="" disabled>Choose user role</option>
                @foreach($roles as $role)

                    <option value ="{{$role->id}}" {{$user_roles==$role->name ? 'selected' : '' }}>{{$role->name}}</option>
                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label for="is_active"><span>وضعیت</span></label>
            <select name="is_active" class="form-group input-lg">
                <option value="1" {{$user->is_active==1 ? 'selected' : ''}}>Active</option>
                <option value="0" {{$user->is_active==0 ? 'selected' : ''}}>Not active</option>
            </select>

        </div>

        <div class="form-group">

            <input name="update" type="submit" class="btn btn-primary">

        </div>

        @if(count($errors) > 0 )
            <div class="alert alert-danger">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif






    </form>
</div>

    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : 'http://placeholder.it/400x400'}}" class="img-responsive img-rounded">

    </div>

@stop
