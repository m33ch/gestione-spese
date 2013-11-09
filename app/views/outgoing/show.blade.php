@extends('layouts.master')

@section('content')
	

		{{ $outgoing->user->name }}<br>
		{{ $outgoing->title }}<br>
		{{ $outgoing->description }}<br>
		{{ $outgoing->date }}<br>
		{{ $outgoing->amount }}<br>
		-------------	
		<br/>

		@foreach ($outgoing->payers as $payer)
			{{$payer->name}}<br>
			{{$payer->pivot->contribution}}<br>

		@endforeach
		-------------

@stop