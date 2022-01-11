
@extends('layouts.app')

@section('content')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" name="Title" class="form-control" id="exampleInputTitle">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <textarea type="text" name="Description" class="form-control" id="exampleInputDescription"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">User</label>
                <select class="form-control" name="userID">
                @foreach($myusers as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
@endsection
