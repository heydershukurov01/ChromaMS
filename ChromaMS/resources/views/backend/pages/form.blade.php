@extends('layouts.backend')

@section('title' , $page->exists ? 'Editing'.$page->title : 'Create New Page')

@section('content')
	{!! Form::model($page, [
		'method' => $page->exists ? 'put' : 'post',
		'route'  => $page->exists ? ['backend.pages.update' , $page->id] : ['backend.pages.store']	
	]) !!}

{{-- Title --}}
	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title' , null , ['class' => 'form-control']) !!}
	</div>
{{-- Title Ends Here --}}
{{-- URI --}}
	<div class="form-group">
		{!! Form::label('uri' , 'URI') !!}
		{!! Form::text('uri' , null , ['class' => 'form-control']) !!}
	</div>
{{-- URI Ends Here --}}
{{-- Name --}}
	<div class="form-group">
		{!! Form::label('name') !!}
		{!! Form::text('name' , null , ['class' => 'form-control']) !!}
	</div>
	<p class="help-block">
		This name is used to generate links to the Page
	</p>
{{-- Name Ends Here --}}
{{-- Templates --}}
<div class="form-group row">
	<div class="col-md-12">
		{!! Form::label('template') !!}
	</div>
	<div class="col-md-4">
		{!! Form::select('template' , $templates , null , ['class' =>'form-control' ]) !!}
	</div>
</div>
{{-- End Of Templates --}}
{{-- Order Of Pages --}}
<div class="form-group row">
	<div class="col-md-12">
		{!! Form::label('order') !!}
	</div>
	<div class="col-md-2">
		{!! Form::select('order',[ '' => '' , 'before'=>'Before' , 'after' => 'After' , 'childOf' => 'Child Of'] , null , [ 'class' => 'form-control' ]) !!}
	</div>
	<div class="col-md-5">
		{!! Form::select('orderPage' , ['' => ''] + $orderPages->lists('padded_title' , 'id')->toArray(), null , ['class'=>'form-control'])  !!}
	</div>
</div>
{{-- End Of Order Of Pages --}}
{{-- Content --}}
	<div class="form-group">
		{!! Form::label('content') !!}
		{!! Form::textarea('content' , null , ['class' => 'form-control']) !!}
	</div>
{{-- Content Ends Here --}}
{{-- CheckBox for hide page from main navigation --}}
	<div class="checkbox">
		<label>
			{!! Form::checkbox('hidden') !!}

			Hide Page From Navigation

			<span class="help-block">
				Checking this will hide  the page from the navigation.Can only  be applied to Pages without children !!!
			</span>
		</label>
	</div>
{{-- Ending of CheckBox--}}
{{-- Submit Button --}}
{!! Form::submit($page->exists ? 'Save Page' : 'Create New Page' , ['class'=>'btn btn-primary']) !!}
{{-- Submit Ends Here --}}
	{!! Form::close() !!}

<script>
	new SimpleMDE().render();
</script>

@stop