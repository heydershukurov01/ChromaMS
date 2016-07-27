@extends('layouts.backend')

@section('title' ,'Delete',$post->title)

@section('content')
	{!! Form::open(['method' => 'delete' , 'route' => ['backend.blog.destroy' , $post->id]]) !!}
		<div class="alert alert-danger">
			<b>Warning!</b>You are  about to delete a post. This action cannot be undone.Are you sure you want to continue?
		</div>
		{!! Form::submit('Yes , delete  this post!',['class' => 'btn btn-danger']) !!}
		<a href="{{ route('backend.blog.index') }}" class="btn btn-success"><b>No , get me out of here!</b></a>
	{!!Form::close()!!}
@stop