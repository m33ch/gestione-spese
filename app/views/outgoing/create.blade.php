@extends('layouts.master')

@section('content')
{{ HTML::style('packages/pickdate/themes/default.css') }}
{{ HTML::style('packages/pickdate/themes/default.date.css') }}
{{ HTML::style('packages/pickdate/themes/default.time.css') }}
{{ HTML::script('packages/pickdate/picker.js') }}
{{ HTML::script('packages/pickdate/picker.date.js') }}
{{ HTML::script('packages/pickdate/picker.time.js') }}
{{ HTML::script('packages/pickdate/translations/it_IT.js') }}
<div class="ui segment">
		<h2 class="ui header">
		  	Nuova Spesa
		</h2>
		{{ Form::open(array('action' => array('OutgoingController@store'), 'method' => 'post', )) }}
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
			@foreach ($users as $user)
				<div class="field {{ $errors->has('contributions') ? 'error' : null;  }} ">
				    <label>Contributo di {{ $user->name }}</label>
				    <input placeholder="0,00" type="text" name="contributions[{{$user->id}}]" value="{{ Input::old('contributions.'.$user->id) }}" >
				    <?php echo $errors->first('contributions') ? '<div class="ui red pointing above label">'.$errors->first('contributions').'</div>' : null;  ?>
				</div>
    		@endforeach
		  <button type="submit" class="ui blue submit button">Crea</button>
		</div>
		{{ Form::close() }}
</div>

@stop