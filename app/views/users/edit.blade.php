@extends('layouts.master')

@section('content')
<div class="wide column"> 
	<div class="ui segment">
		<h2 class="ui header">
		  	Modifica Dati Utente
		</h2>
		<div class="ui error form segment">
		   <div class="two fields">
		    <div class="field">
		      	<label>Nome</label>
		      	<div class="ui left labeled icon input">
		      	<i class="user icon"></i>
			        <input placeholder="Nome" type="text" name="name" value="{{ $user->name }}" >
			        <div class="ui corner label">
		       			<i class="icon asterisk"></i>
		      		</div>
		      	</div>
		    </div>
		    <div class="field">
		      	<label>Email</label>
		      	<div class="ui left labeled icon input">
		      		<i class="mail icon"></i>
		      		<input placeholder="Email" type="text" name="email" value="{{ $user->email }}" >
		      		<div class="ui corner label">
		       			<i class="icon asterisk"></i>
		      		</div>
		  	  	</div>
		    </div>
		  </div>
		  <div class="field">
		    	<label>Password</label>
		    	<div class="ui left labeled icon input">
		    	<i class="key icon"></i>
		      		<input type="password" name="password">
		      		<div class="ui corner label">
		        		<i class="icon asterisk"></i>
		      		</div>
		    	</div>
		  </div>
		  <div class="ui blue submit button">Crea</div>
		</div>
	</div>
</di

@stop