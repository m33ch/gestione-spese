@extends('layouts.master')

@section('content')
<div class="wide column"> 
	<div class="ui segment">
		<h2 class="ui header">
		  	Nuova Spesa
		</h2>
		{{ Form::open(array('url' => 'outgoings/create')) }}
		<div class="ui error form segment">
			<div class="field">
			    <label>Titolo</label>
			    <input placeholder="inserisci un titolo" type="text" name="title" value="{{ Input::old('title'); }}" >
			   <?php echo $errors->first('title') ? '<div class="ui red pointing above ui label">'.$errors->first('title').'</div>' : null;  ?>
			</div>
			<div class="field">
			    <label>Descrizione</label>
			    <textarea placeholder="fai una lista qui di quello che hai comprato" name="drescription" >{{ Input::old('description'); }}</textarea>
			</div>
		  	<div class="field">
			    <label>Data </label>
			    <input placeholder="inserisci la data di acquisto" type="text" name="date" value="{{ Input::old('date'); }}" >
			</div>
			<div class="field">
			    <label>Costo Spesa </label>
			    <input placeholder="inserisci qui l'importo totale speso" type="text" name="amount" value="{{ Input::old('amount'); }}" >
			</div>
		  <button type="submit" class="ui blue submit button">Crea</button>
		</div>
		{{ Form::close() }}
	</div>
</di

@stop