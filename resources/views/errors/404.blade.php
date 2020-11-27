<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>আবেদীন স্যানিটারী | 404 Not Found </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body> 
        <div class="container">
          <div class="row " style="margin-top: 120px;">
           <div  class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h2 class="m-auto"></h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h2 class="m-auto text-danger">Opps.!! 404 Page Not Found </h2>
                      </div>
                      <hr>
                      <div class="form-group">
                        <h5 class="m-auto">Return Back To</h5>
                      </div>
                  
                      <div class="form-group ">                         
                        <a href="{{ url('/') }}" type="submit" class="btn btn-success">Home</a>
                      </div>
                                       
                </div>
            </div>
        </div>

    </div>
</body>
</html>
