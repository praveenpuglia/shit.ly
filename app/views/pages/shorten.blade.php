@extends('includes.template')

@section('content')
	<h1 class = "text-center">Shit.ly</h1>
	<form action="/shorten" method="POST" role="form">
		<legend>Make space for your Tweets!</legend>
	
		<div class="form-group">
			<input type="text" class="form-control" id="" placeholder="Input field">
		</div>
	
		
	
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@stop