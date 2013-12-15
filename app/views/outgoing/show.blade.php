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
		<?php $i = 0; ?>
		@foreach ($payers as $key => $value)
						
							Contribuenti inseriti il {{ $key }} <br />
							@foreach ($value as $payer)
								
								Contributo di {{$payer['name']}} : {{$payer['contribution'] }} <br />
								
							@endforeach
						<?php $i++; ?>
	    @endforeach
		-------------

@stop