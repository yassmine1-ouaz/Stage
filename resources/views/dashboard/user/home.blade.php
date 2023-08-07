<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('bootstrap/js/bootstrap.min.js') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4.offset-md-4" style="margin-top: 45px;">
            <h4> user Dashboard</h4>
            <hr>
         <table class="table-striped-columns">
         <thead>
         <tr>
             <th>Name</th>
             <th>Email</th>
             <th>Action</th>
         </tr>
         </thead>
             <tbody>
             <td>{{Auth::user()->name}}</td>
             <td>{{Auth::user()->email}}</td>
             <td><a href="{{ route('user.logout') }}"></a>Logout</td>

             </tbody>
         </table>

        </div>
    </div> </div>

</body>
</html>
