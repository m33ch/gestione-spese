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
		  	Modifica Spesa
		</h2>
		{{ Form::open(array('action' => array('OutgoingController@update', $outgoing->id), 'method' => 'put', )) }}
		<div class="ui form segment">
			<div class="field <?php echo $errors->first('title') ? 'error' : null;  ?>">
			    <label>Titolo</label>
			    <input placeholder="inserisci un titolo" type="text" name="title" value="{{ $outgoing->title }}" >
			   <?php echo $errors->first('title') ? '<div class="ui red pointing above label">'.$errors->first('title').'</div>' : null;  ?>
			</div>
			<div class="field <?php echo $errors->first('description') ? 'error' : null;  ?>">
			    <label>Descrizione</label>
			    <textarea placeholder="fai una lista qui di quello che hai comprato" name="description" >{{ $outgoing->title }}</textarea>
			    <?php echo $errors->first('description') ? '<div class="ui red pointing above label">'.$errors->first('description').'</div>' : null;  ?>
			</div>
		  	<div class="date field <?php echo $errors->first('date') ? 'error' : null;  ?>">
			    <label>Data </label>
			    <input placeholder="xx/xx/xxxx" class="datepicker" type="text" name="date" value="{{ $outgoing->date }}" data-value="{{ $outgoing->date }}">
			    <?php echo $errors->first('date') ? '<div class="ui red pointing above label">'.$errors->first('date').'</div>' : null;  ?>
			</div>
			<div class="field <?php echo $errors->first('amount') ? 'error' : null;  ?>">
			    <label>Costo Spesa </label>
			    <input placeholder="inserisci qui l'importo totale speso" type="text" name="amount" value="{{ $outgoing->amount }}" >
			    <?php echo $errors->first('amount') ? '<div class="ui red pointing above label">'.$errors->first('amount').'</div>' : null;  ?>
			</div>
			@foreach ($outgoing->payers as $payer)
				<div class="field {{ $errors->has('contributions') ? 'error' : null;  }} ">
					<label>Contributo di {{ $payer->name }}</label>
					<input placeholder="0.00" type="text" name="contributions[{{$payer->id}}]" value="{{ $payer->pivot->contribution }}" >
					<?php echo $errors->first('contributions') ? '<div class="ui red pointing above label">'.$errors->first('contributions').'</div>' : null;  ?>
				</div>
    		@endforeach
		  <button type="submit" class="ui blue submit button">Aggiorna</button>
		</div>
		{{ Form::close() }}
</div>

@stop