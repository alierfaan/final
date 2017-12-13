
@extends('layouts.admin');

@section('content')

    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>

          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'فعال': 'غیرفعال' }}</td>
            <td style="direction: ltr">{{$user->created_at->diffForHumans()}}</td>
            <td style="direction: ltr">{{$user->updated_at->diffForHumans()}}</td>

          </tr>
            @endforeach

        @endif



        </tbody>
      </table>
    </div>




@stop

