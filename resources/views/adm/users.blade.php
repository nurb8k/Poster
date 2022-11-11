@extends('layouts.adm')
@section('title','Admin panel')
@section('content')
    <h1>users</h1>
    <form action="{{route('adm.users.search')}}" method="GET">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Username"
                   aria-describedby="basic-addon1">
            <button type="submit" class="btn btn-success">SEARCH</button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">##</th>
            <th scope="col">##</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($users);$i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->name}}</td>
                <td>
{{--                   ? true : false     --}}
                    <form action="
                    @if($users[$i]->is_active)
                        {{route('adm.users.ban',$users[$i]->id)}}
                    @else
                        {{route('adm.users.unban',$users[$i]->id)}}
                    @endif
                    " method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger" type="submit">
                            @if($users[$i]->is_active)
                                BAN
                            @else
                                UNBAN
                            @endif
                        </button>
                    </form>

                </td>
                <td>#</td>
            </tr>
        @endfor
        </tbody>
    </table>
@endsection

