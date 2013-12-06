@extends('layouts.master')

@section('content')
	

		{{ $outgoing->author->name }}<br>
		{{ $outgoing->title }}<br>
		{{ $outgoing->description }}<br>
		{{ $outgoing->date }}<br>
		{{ $outgoing->amount }}<br>
		{{ $outgoing->status }}<br>
		-------------	
		<br/>
		{{ $data = '' }}
		@foreach ($payers as $payer)
			
			@if ($data != $payer->pivot->created_at)
				Contribuenti inseriti il {{ $data = $payer->pivot->created_at }} <br/>
			@endif
			{{$payer->name}}
			{{$payer->pivot->contribution}} €
			<br />

		@endforeach
		-------------

@stop