@extends('includes.template')

@section('content')
	<p class="redirect-message">
		Redirecting to <span class="redirect-url">{{$originalUrl}}</span> in <span class="timer">5</span> second(s)... 
	</p>
	<div class="ad-holder shake shake-constant shake-slow">
		Advertise!
	</div>

	<input type = "hidden" value = "{{$originalUrl}}" id = "redirect-url"/>
	<script>
		setTimeout(function(){
			clearInterval(timerInterval);
			window.location.href = document.getElementById("redirect-url").value;
		},5010);

		var timerInterval =  setInterval(function(){
			var timer = $(".timer");
			timerValue = parseInt( timer.text() );
			console.log(timerValue);		
			timer.text(  timerValue - 1 );
		},1000);
	</script>
@stop
