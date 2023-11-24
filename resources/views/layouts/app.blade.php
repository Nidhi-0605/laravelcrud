<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default bg-dark">
 
    
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" href="/">Products</a>
    </li>
    
     
    </ul>
 
</nav>

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <strong>{{  $message }}</strong>
</div>
@endif

@yield('main')
</body>
</html>