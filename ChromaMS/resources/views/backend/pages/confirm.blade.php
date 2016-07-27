@extends('layouts.backend')

@section('title' ,'Delete',$page->title)

@section('content')
	{!! Form::open(['method' => 'delete' , 'route' => ['backend.pages.destroy' , $page->id]]) !!}
		<div class="alert alert-danger">
			<b>Warning!</b>You are  about to delete a Page. This action cannot be undone.Are you sure you want to continue?
		</div>
		{!! Form::submit('Yes , delete  this Page!',['class' => 'btn btn-danger']) !!}
		<a href="{{ route('backend.pages.index') }}" class="btn btn-success"><b>No , get me out of here!</b></a>
	{!!Form::close()!!}
@stop