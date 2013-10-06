@extends('layouts.master')

@section('content')
<div class="wide column"> 
	<div class="ui segment">
		<h2 class="ui header">
		  	Nuovo Utente
		</h2>
		<div class="ui error form segment">
		   <div class="two fields">
		    <div class="field">
		      <label>Nome</label>
		      <input placeholder="Nome" type="text" name="name" value="" >
		    </div>
		    <div class="field">
		      <label>Email</label>
		      <input placeholder="Email" type="text" name="email" value="" >
		    </div>
		  </div>
		  <div class="field">
		    <label>Password</label>
		    <div class="ui left labeled icon input">
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