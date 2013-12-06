<!-- Stored in app/views/layouts/master.blade.php -->
<!DOCTYPE html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Gestspese</title>
  <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  {{ HTML::style('assets/css/semantic.min.css') }}
  {{ HTML::style('assets/css/style.css') }}

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  {{ HTML::script('assets/javascript/semantic.min.js') }}
  {{ HTML::script('assets/javascript/scripts.js') }}
</head>
<body>

  @if ( Auth::check() )
  <div class="ui menu">
    <a class="item <?php echo $currentMenu == 'user' ? 'active' : null ?>" href="{{ url('user') }}">
        <i class="users icon"></i> Utenti
    </a>
    <a class="item <?php echo $currentMenu == 'outgoing' ? 'active' : null ?>" href="{{ url('outgoing') }}">
        <i class="browser icon"></i> Spese
    </a>
    <div class="ui right menu">
      <div class="ui dropdown item">
       <i class="user icon"></i> Benvenuto {{ $currentUser->name }} <i class="dropdown icon"></i>
        <div class="ui menu">
          {{ HTML::link('user/profile/'.$currentUser->id, 'Profilo', array('class'=>'item')) }}
          {{ HTML::link('user/edit/'.$currentUser->id, 'Modifica Dati', array('class'=>'item')) }}
          {{ HTML::link('logout', 'Log-out', array('class'=>'item')) }}
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- Messages -->
  
  <div class="main container">
    @include('messages.messages')
    <!-- Contenuto -->
    @yield('content')
  </div>
  
</body>

</html>