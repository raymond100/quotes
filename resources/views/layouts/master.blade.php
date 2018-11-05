<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>@yield('title')</title>

  </head>
  <body style="padding-top: 50px; margin:auto;">
    
    <div class="container">

      @section('quote')
          <h1 class="text-center">Latest Quotes</h1>
          @if(!empty(Request::segment(1)))
            <section class="alert-info">
              A filter has been set <a href="{{ route('index') }}">Show all quotes</a>
            </section>
          @endif
          @if(count($errors) > 1)
            <section class="alert-danger">
              @foreach($errors->all() as $error)
                <ul>
                  <li>{{$error}}</li>
                </ul>
              @endforeach
            </section>
          @endif
          @if(Session::has('success'))
            <section class="alert-success text-center">
              {{ Session::get('success') }}
            </section>
           @endif
            @if(Session::has('info'))
            <section class="alert-info text-center">
              {{ Session::get('info') }}
            </section>
           @endif
      @show
      <br>
      @yield('content');
      
    </div>
   
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>