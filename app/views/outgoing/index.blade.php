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
				    <th>Creata da</th>
				    <th>Titolo</th>
				    <th>Data</th>
				    <th>Totale</th>
				    <th class="two wide"></th>
				    <th class="one wide"></th>
			  	</tr>
			</thead>
		    <tbody>
		    	@foreach ($outgoings as $outgoing)  
			    <tr>
			      	<td>{{ $outgoing->id }}</td>
			      	<td>{{ $outgoing->author->name }}</td>
			      	<td>{{ $outgoing->title }}</td>
			      	<td>{{ date("d/m/Y", strtotime($outgoing->date)) }}</td>
			      	<td>{{ $outgoing->amount }}</td>
			      	<td>
			      		<div class="ui icon buttons">
			      			<a href="{{ action('OutgoingController@show', $outgoing->id) }}" class="ui icon button"><i class="info link letter icon"></i></a>
			      			<a href="{{ action('OutgoingController@edit', $outgoing->id) }}" class="ui icon button"><i class="edit link icon"></i></a>
			      		</div>
			      	</td>
			      	<td>
			      		{{ Form::open(array('method' => 'DELETE', 'action' => array('OutgoingController@destroy',$outgoing->id))) }}
			      			<button type="submit" data-variation="inverted" data-content="Elimina {{ $outgoing->title }}" class="ui icon button negative delete"><i class="trash link icon"></i></button>
			      		{{ Form::close() }}
			      	</td>
			    </tr>
			@endforeach
		    </tbody>
		    <tfoot>
			    <tr>
			    	<th colspan="7">
			      		<a href="outgoing/create" class="ui blue labeled icon button"><i class="user icon"></i> Aggiungi spesa</a>
			    	</th>
			    </tr>
		    </tfoot>
		</table>
		<div class="ui divider"></div>
		{{ $outgoings->links(); }}
	</div>
@stop