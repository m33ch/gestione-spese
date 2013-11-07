@extends('layouts.master')

@section('content')
	<div class="ui segment">
		<h2 class="ui header">
		  	Lista Spese
		</h2>
		<table class="ui sortable table segment">
			<thead>
			    <tr>
			    	<th class="one wide">Id</th>
				    <th>Utente</th>
				    <th>Titolo</th>
				    <th>Data</th>
				    <th>Totale</th>
			  	</tr>
			</thead>
		    <tbody>
		    	@foreach ($outgoings as $outgoing)  
			    <tr>
			      	<td><?php echo $outgoing->id ?></td>
			      	<td><?php echo $outgoing->user->name ?></td>
			      	<td><?php echo $outgoing->title ?></td>
			      	<td><?php echo date("d/m/Y", strtotime($outgoing->date)) ?></td>
			      	<td><?php echo $outgoing->amount ?></td>
			    </tr>
			@endforeach
		    </tbody>
		    <tfoot>
			    <tr>
			    	<th colspan="5">

			      		<a href="outgoing/create" class="ui blue labeled icon button"><i class="user icon"></i> Aggiungi spesa</a>
			    	</th>
			    </tr>
		    </tfoot>
		</table>
	</div>

@stop