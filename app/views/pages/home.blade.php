@extends('includes.template')

@section('content')
	<h1 class = "title">Shit.ly</h1>
	<form action="/shorten" method="POST" role="form" class="url-input-form">
			<input type="url" required name="inputURL" class="input-url" id="" placeholder="Your favourite Link...">	
		<div class="button-shorten-container">
			<button type="submit" class="button-shorten">Shorten!</button>
		</div>
	</form>
	
	<div class="message success-message">
		:) There you go! &mdash; <span class="shortened-url"></span>
	</div>
	
	<div class="message something-wrong">
		:( Oops! Something went wrong. Please try again!
	</div>


	<script type = "text/javascript">
		$.ajaxSetup({
		   beforeSend: function(){
		   		$(".shortened-url").html("<i class = 'loader loader-8'></i>");
		   }
		});

		$(".button-shorten").on("click",function(event){
			//stop default
			event.preventDefault();

			var urlField = $(".input-url");
			if(urlField.val().trim() == "" || !validateURL(urlField.val())) {
				urlField.addClass("shake shake-slow shake-constant url-error");
				setTimeout(function(){
					urlField.removeClass("shake shake-slow shake-constant url-error");
				},1000);
				return;
			}			

			//throw ajax
			$.post("/shorten",{
				url:urlField.val()
			},function(data){
				if(data == "ERROR"){
					$(".something-wrong").fadeIn();
				}
				else {
					$(".shortened-url").html(data).parent().fadeIn();
				}
			});
		});

		function validateURL(url){
			if(/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url)) {
			  	return true;
			} else {
			  	return false;
			}
		}
		</script>
@stop