
@extends('layouts.app')

@section('content')

    <a href="{{route('posts.create')}}" type="button" class="btn btn-success"> Create Post </a>
<table class="table mt-2">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($myposts as $post)
    <tr>
{{--        $post-> == $post['id']      لاحظ   --}}
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->user ? $post->user->name : 'Null'}}</td>   {{-- عملنها كدا عشان لو رجع صفر --}}
        <td>{{$post->created_at->format('Y-m-d')}}</td>
{{--        <td>{{$post->created_at->format('Y-m-d h-m-s')}}</td>   لعرض الوقت بالساعه كمان  --}}
        <td>
{{--          <a href="/posts/{{$post->id}}" class="btn btn-info">View</a>     طريقه ال href التقليديه--}}
{{--          <a href="{{route('posts.show',['showPost'=>$post->id])}}" class="btn btn-info">View</a> --}}
            <a href="{{route('posts.show' , $post->id)}}" class="btn btn-info">View</a>
            <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">Edit</a>
            <form method="POST" action="{{route('posts.destroy' , $post->id)}}" style="display: inline">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to deleted this Post ?!')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
</div>
@endsection
