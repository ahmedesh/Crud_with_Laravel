

@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('posts.update',['showPost'=>$myeditpost->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">

            <label for="exampleInputTitle">Title</label>
            <input type="text" name="Title" class="form-control" id="exampleInputTitle" value="{{$myeditpost->title}}">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <textarea type="text" name="Description" class="form-control" id="exampleInputDescription">{{$myeditpost->description}} </textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">User</label>
            <select class="form-control" name="userID">
                @foreach($users as $user)
                    <option value="{{$user->id}}" @if($user->id == $myeditpost->user_id) selected @endif>
                            {{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="Update" class="btn btn-primary">Update Post</button>
    </form>

@endsection
