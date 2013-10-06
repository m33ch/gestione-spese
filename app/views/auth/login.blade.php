@extends('layouts.master')

@section('content')
 
<div class="wide column"> 
<div class="ui form segment">
	{{ Form::open(array('url'=>'login')) }}
	  <div class="field <?php echo $errors->first('email') ? 'error' : null;  ?> ">
	    <label>Email</label>
	    <div class="ui left labeled icon input">
	      <input placeholder="Email" type="text" name="email" value="{{ Input::old('email') }}">
	      <i class="user icon"></i>
	      <div class="ui corner label">
	        <i class="icon asterisk"></i>
	      </div>
	      <?php echo $errors->first('email') ? '<div class="ui red pointing above ui label">'.$errors->first('email').'</div>' : null;  ?>
	    </div>
	  </div>
	  <div class="field <?php echo $errors->first('password') ? 'error' : null;  ?> ">
	    <label>Password</label>
	    <div class="ui left labeled icon input">
	      <input type="password" name="password" value="">
	      <i class="lock icon"></i>
	      <div class="ui corner label">
	        <i class="icon asterisk"></i>
	      </div>
	        <?php echo $errors->first('password') ? '<div class="ui red pointing above ui label">'.$errors->first('password').'</div>' : null;  ?>
	    </div>
	  </div>
	  <div class="ui error message">
	    <div class="header"></div>
	  </div>
	  <button type="submit" class="ui blue submit button">Login</button>
  	{{ Form::close() }}
</div>
</div>
@stop