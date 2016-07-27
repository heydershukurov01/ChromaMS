@extends('layouts.auth')

@section('title' , 'Forgot Password ?')

@section('heading', 'Please Provide E-Mail to change password reset link!')

@section('content')

	{!! Form::open(array()) !!}
    
    {{-- Email --}}
<div class="form-group">
    {!! Form::label('email') !!}

    {!! Form::text('email' ,null, ['class'=>'form-control'])!!}
</div>


	{!! Form::submit('Send Password Reset link',['class'=>'btn btn-primary']) !!}




	{!! Form::close() !!}
	
@endsection