
@extends('layouts.app')

@section('content')

<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="card-title"> <b>Id:- </b> {{$myposts->id}} </h5>
        <h5 class="card-title"> <b>Title:- </b> {{$myposts->title}} </h5>   {{-- محطتش هنا foreach عشان انا كدا كدا بستدعيه بال id بتاعه --}}
        <h5 class="card-title"> <b>Description:- </b> {{$myposts->description}} </h5>
    </div>
</div>
</div>

@endsection
