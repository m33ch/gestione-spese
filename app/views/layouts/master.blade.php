<!-- Stored in app/views/layouts/master.blade.php -->

<!DOCTYPE html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Gestspese</title>
 
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  {{ HTML::style('assets/css/semantic.min.css') }}

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  {{ HTML::script('assets/javascript/semantic.min.js') }}

</head>
<body>
  <!-- Success-Messages -->
  @if ($message = Session::get('success'))
        <div class="ui success message">
          <i class="close icon"></i>
          <div class="header">
            {{{ $message }}}
          </div>
      </div>
  @endif
  
  <div class="ui grid">
   		@yield('content')
  </div>
</body>

</html>