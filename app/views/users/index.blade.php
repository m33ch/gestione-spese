@extends('layouts.master')

@section('content')
	<div class="ui segment">
		<h2 class="ui header">
		  	Lista utenti
		</h2>
		<table class="ui sortable table segment">
			<thead>
			    <tr>
			    	<th>Id</th>
				    <th>Nome</th>
				    <th>Email</th>
			  	</tr>
			</thead>
		    <tbody>
		    	<?php foreach ($users as $user) : ?>
			    <tr>
			      	<td><?php echo $user->id ?></td>
			      	<td><?php echo $user->name ?></td>
			      	<td><?php echo $user->email ?></td>
			    </tr>
			<?php endforeach; ?>
		    </tbody>
		    <tfoot>
			    <tr>
			    	<th colspan="3">
			      		<div class="ui blue labeled icon button"><i class="user icon"></i> Add User</div>
			    	</th>
			    </tr>
			    <tr>
			    	<th colspan="3">
			    		<?php //echo $users->links(); ?>
			    	</th>
			    </tr>
		    </tfoot>
		</table>
	</div>

@stop