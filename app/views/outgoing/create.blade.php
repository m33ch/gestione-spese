@extends('layouts.master')

@section('content')
{{ HTML::style('packages/pickdate/themes/default.css') }}
{{ HTML::style('packages/pickdate/themes/default.date.css') }}
{{ HTML::style('packages/pickdate/themes/default.time.css') }}
{{ HTML::script('packages/pickdate/picker.js') }}
{{ HTML::script('packages/pickdate/picker.date.js') }}
{{ HTML::script('packages/pickdate/picker.time.js') }}
{{ HTML::script('packages/pickdate/translations/it_IT.js') }}
<div class="wide column"> 
	<div class="ui segment">
		<h2 class="ui header">
		  	Nuova Spesa
		</h2>
		{{ Form::open(array('url' => 'outgoing/create')) }}
		<div class="ui form segment">
			<div class="field <?php echo $errors->first('title') ? 'error' : null;  ?>">
			    <label>Titolo</label>
			    <input placeholder="inserisci un titolo" type="text" name="title" value="{{ Input::old('title') }}" >
			   <?php echo $errors->first('title') ? '<div class="ui red pointing above label">'.$errors->first('title').'</div>' : null;  ?>
			</div>
			<div class="field <?php echo $errors->first('description') ? 'error' : null;  ?>">
			    <label>Descrizione</label>
			    <textarea placeholder="fai una lista qui di quello che hai comprato" name="description" >{{ Input::old('description'); }}</textarea>
			    <?php echo $errors->first('description') ? '<div class="ui red pointing above label">'.$errors->first('description').'</div>' : null;  ?>
			</div>
		  	<div class="date field <?php echo $errors->first('date') ? 'error' : null;  ?>">
			    <label>Data </label>
			    <input placeholder="xx/xx/xxxx" class="datepicker" type="text" name="date" value="{{ Input::old('date') }}" data-value="{{ Input::old('date_submit') }}">

			    <?php echo $errors->first('date') ? '<div class="ui red pointing above label">'.$errors->first('date').'</div>' : null;  ?>
			</div>
			<div class="field <?php echo $errors->first('amount') ? 'error' : null;  ?>">
			    <label>Costo Spesa </label>
			    <input placeholder="inserisci qui l'importo totale speso" type="text" name="amount" value="{{ Input::old('amount') }}" >
			    <?php echo $errors->first('amount') ? '<div class="ui red pointing above label">'.$errors->first('amount').'</div>' : null;  ?>
			</div>
			<div class="ui <?php echo $errors->first('payers') ? 'red' : null;  ?> pointing below label">Seleziona i contribuenti</div>
			<div class="grouped fields">
			<?php $i = 0; ?>
			@foreach ($users as $user)
				<div class="field <?php echo $errors->first('payers') ? 'error' : null;  ?>">
				    <div class="ui checkbox">
				      	<?php 
				      		$checked = '';
				      		$visibility = 'hidden';
				      		if (Input::old('payers')) {
				      			if (in_array($user->id, Input::old('payers'))) {
				      				$checked = 'checked = "checked" ';
				      				$visibility = 'visible';
				      			}
				      		}
				      	?>
				        <input name="payers[]" value="{{$user->id}}" id="user_{{$user->id}}" type="checkbox" {{$checked}}>
				        <label for="user_{{$user->id}}">{{$user->name}}</label>
				    </div>
				</div>
				<div class="field">
				  	<div class="ui input transition {{ $visibility }} ">
    			  		<input placeholder="Contributo di {{$user->name}}" type="text" value="{{ Input::old('contributions.'.$i) }}" name="contributions[{{$user->id}}]">
    				</div>
    			</div>
    			<?php $i++; ?>
    		@endforeach
			</div>
		  <button type="submit" class="ui blue submit button">Crea</button>
		</div>
		{{ Form::close() }}
	</div>
</div>

@stop