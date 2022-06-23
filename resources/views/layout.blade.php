<!DOCTYPE html>
<html>
    <head>
        <title>TAAMINI</title>
        {{-- {!! MaterializeCSS::include_css() !!} --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
      <div class="container">
          <div class="row" style="padding-top:10px;">
              {{-- <div class="center-align">
                <a class="btn blue waves-effect waves-light lighten-1 white-text" href="/"> Home </a>
                  @if(Auth::check())
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/logout"> Logout </a>
                    <a class="btn-flat disabled" href="#" style="text-transform:none;">{{ Auth::user()->email }}</a>
                  @else
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/login"> Login </a>
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/register"> Register </a>
                  @endif
              </div> --}}
          </div>
          <div class="row">
              <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:10px;">
                @yield('content')
              </div>
          </div>
      </div>
    </body>

    <script src="{{ URL::asset('jquery.min.js') }}"></script>
    <script src="{{ URL::asset('materialize.min.js') }}"></script>
    <script src="{{ URL::asset('init.js') }}"></script>

</html>
