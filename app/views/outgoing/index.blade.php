@extends('layouts.master')

@section('content')
	<div class="ui segment">
		<h2 class="ui header">
		  	Lista Spese
		</h2>
		<table class="ui table celled">
			<thead>
			    <tr>
			    	<th class="one wide">Id</th>
				    <th>Utente</th>
				    <th>Titolo</th>
				    <th>Data</th>
				    <th>Totale</th>
				    <th class="two wide"></th>
			  	</tr>
			</thead>
		    <tbody>
		    	@foreach ($outgoings as $outgoing)  
			    <tr>
			      	<td>{{ $outgoing->id }}</td>
			      	<td>{{ $outgoing->user->name }}</td>
			      	<td>{{ $outgoing->title }}</td>
			      	<td>{{ date("d/m/Y", strtotime($outgoing->date)) }}</td>
			      	<td>{{ $outgoing->amount }}</td>
			      	<td><div class="ui icon buttons">
			      			<a href="{{ action('OutgoingController@show', $outgoing->id) }}" class="ui icon button"><i class="info link letter icon"></i></a>
			      			<a href="{{ action('OutgoingController@edit', $outgoing->id) }}" class="ui icon button"><i class="edit link icon"></i></a>
			      		</div>
			      	</td>
			    </tr>
			@endforeach
		    </tbody>
		    <tfoot>
			    <tr>
			    	<th colspan="6">
			      		<a href="outgoing/create" class="ui blue labeled icon button"><i class="user icon"></i> Aggiungi spesa</a>
			    	</th>
			    </tr>
		    </tfoot>
		</table>
		<div class="ui divider"></div>
		{{ $outgoings->links(); }}
	</div>

@stop