@extends('layouts.master')

@section('content')
	<div class="ui segment">
		<h2 class="ui header">
		  	Il tuo profilo
		</h2>
		<div class="ui list">
		  <div class="item">
		    <div class="header">Nome</div>
		   <?php echo $user->name; ?>
		  </div>
		  <div class="item">
		    <div class="header">E-mail</div>
		    <?php echo $user->email; ?>
		  </div>
		 </div>
	</div>
@stop