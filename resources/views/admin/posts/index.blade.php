
@extends('layouts.admin');

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('deleted_user'))
        <p class="bg-danger">کاربر با موفقیت حذف شد</p>

    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>تصویر</th>
                <th>کاربر</th>
                <th>دسته</th>
                <th>عنوان</th>
                <th>متن</th>
                <th>Created</th>
                <th>Updated</th>

            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="50px" width="50px" src="{{$post->photo ? $post->photo->file : 'http://placeholder.it/400x400'}}"></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name : 'بدون دسته'}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForhumans()}}</td>
                        <td>{{$post->updated_at->diffForhumans()}}</td>
                    </tr>
                @endforeach

            @endif



            </tbody>
        </table>
    </div>

@stop

