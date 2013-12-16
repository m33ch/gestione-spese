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
		{{ Form::open(array('action' => array('OutgoingController@update', $outgoing->id), 'method' => 'put' )) }}
		<div class="ui form segment">
			
			<div class="three fields">
				<div class="field <?php echo $errors->first('title') ? 'error' : null;  ?>">
				    <label>Titolo</label>
				    <input placeholder="inserisci un titolo" type="text" name="title" value="{{ $outgoing->title }}" >
				   <?php echo $errors->first('title') ? '<div class="ui red pointing above label">'.$errors->first('title').'</div>' : null;  ?>
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
			</div>
			<div class="field <?php echo $errors->first('description') ? 'error' : null;  ?>">
			    <label>Descrizione</label>
			    <textarea placeholder="fai una lista qui di quello che hai comprato" name="description" >{{ $outgoing->title }}</textarea>
			    <?php echo $errors->first('description') ? '<div class="ui red pointing above label">'.$errors->first('description').'</div>' : null;  ?>
			</div>
			<div class="ui fluid accordion">
				<?php $i = 0; $j = 0;?>
				@foreach ($payers as $key => $value)
						<div class="<?php echo $i == 0 ? 'active' : false; ?> title">
			    			<i class="dropdown icon"></i>
							Contribuenti inseriti il {{ $key }} 
						</div>
						<div class="<?php echo $i == 0 ? 'active' : false; ?> content">
							<?php $j = 0;?>
							@foreach ($value as $payer)
								<div class="field {{ $errors->has('contributions') ? 'error' : null;  }} ">
									<div class="ui divided tiny list">
									  <div class="item">
									      <b class="header">Contributo di : </b>
									      <span class="description">{{$payer['name']}}</span>
									  </div>
									  <div class="item">
									      <b class="header">Inserito alle ore : </b>
									      <span class="description">{{ $payer['created_at'] }}</span>
									  </div>
									  <div class="item">
									      <b class="header">Aggiornato alle ore :</b>
									      <span class="description">{{ $payer['updated_at'] }}</span>
									  </div>
									</div>
									<input placeholder="0.00" type="text" name="contributions[{{$payer['id']}}]" value="{{$payer['contribution'] }}" >
									<?php echo $errors->first('contributions') ? '<div class="ui red pointing above label">'.$errors->first('contributions').'</div>' : null;  ?>
								</div>
								<?php if ($j != (count($value) - 1)) : ?>
									<div class="ui section divider"></div>
								<?php endif; ?>
								<?php $j++; ?>
							@endforeach
						</div>
						<?php $i++; ?>
	    		@endforeach
    		</div>
		  	<div id="add_payer" class="ui column grid transition hidden">
		  		<div class="ui three wide column">
				 	<div class="grouped inline fields">
						  	@foreach ($users as $user)
							  	<div class="field">
								  	<div class="ui checkbox">
									  <input type="checkbox" value="{{$user->id}}">
									  <label>{{$user->name}}</label>
									</div>
								</div>
							@endforeach
					</div>
					<div class="ui button green save transition hidden">Salva</div>
				</div>
				<div class="ui thirteen wide column ">
					<div id="contributions" class="three fields"></div>
				</div>
			</div>
		</div>
		<div class="two fluid ui buttons ">
			 <button type="submit" class="ui icon labeled blue button"><i class="checkmark icon"></i> Aggiorna Spesa</button>
			 <button class="ui icon right labeled green button icon add">Aggiungi Contribuente <i class="add icon"></i></button>
		</div>
		{{ Form::close() }}
</div>
@stop