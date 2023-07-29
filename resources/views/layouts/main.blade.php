<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  
  <title>Welcome</title>
  
  <x-datatables-css-cdn />
  <x-bootstrap-styles />
</head>
<body>
  <x-navbar />
  @yield('list-table')
  
  <x-bootstrap-scripts />
  <x-jquery-cdn />
  <x-datatables-jquery-cdn />
  <x-datatables-initialising />
</body>
</html>