@extends('layouts.admin')



@section('content')
<h1>ایجاد کاربر جدید</h1>
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

    <form action="{{ action('AdminUsersController@store') }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">

            <label for="name"><span>نام کابر</span></label>
            <input name="name" type="text" class="text-left input-lg">

        </div>

        <div class="form-group">

            <label for="pwd"><span>پسورد</span></label>
            <input name="pwd" type="password" class="text-left input-lg" id="pwd">

        </div>
        <div class="form-group">

            <label for="email"><span>ایمیل</span></label>
            <input name="email" type="email" class="text-left input-lg">

        </div>

        <div class="form-group">

            <label for="photo_id"><span>تصویر</span></label>
            <input name="photo_id" type="file" class="text-left input-lg">

        </div>

        <div class="form-group">

            <label for="role_id" class="text-right"><span>نقش</span></label>
            {{--<select name="role_id[]" class="form-group input-lg" multiple>--}}
            <select name="role_id" class="form-group input-lg" multiple>
                @foreach($roles as $role)

                <option value ="{{$role->id}}">{{$role->name}}</option>
                @endforeach

            </select>

        </div>

        <div class="form-group">

            <label for="is_active"><span>وضعیت</span></label>
            <select name="is_active" class="form-group input-lg">
                <option value="1">Active</option>
                <option value="0">Not active</option>
            </select>

        </div>

        <div class="form-group">

            <input name="submit" type="submit" class="btn btn-primary">

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
    @stop
