<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    
      <a class="navbar-brand" href="{{URL::to('/trangchu')}}">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <?php $id = Session::get('_id');
            $index = Session::get('index');
            $name = Session::get('name');
            //echo $id?>
        
        @if ($index == 1)
        
        <li><a href="{{URL::to('/add')}}">Th??m sinh vi??n</a></li>
        <li><a href="{{URL::to('/lop')}}">Th??m l???p</a></li>
        <li><a href="{{URL::to('/khoa')}}">Th??m khoa</a></li>
        <li><a href="{{URL::to('/view')}}">Xem th??ng tin sinh vi??n</a></li>
        @endif
        @if ($id)
        <li><a href="{{URL::to('/profile',$id)}}">{{$name}}</a></li> 
        <li><a href="{{URL::to('/logout')}}">????ng Xu???t</a></li>
        @else
        <li><a href="{{URL::to('/login')}}">????ng nh???p</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 ">
<!-- <form action="{{URL::to('/search')}}" method="GET">
  <input name="search" style="color: black;" type="text"> <button style="color: black;" type="submit" > Tim</button>
  </form> -->
  
<h2 style="text-align: center">Danh s??ch khoa</h2>
              
  <table class="table">
    <thead>
      <tr>
        
        <th>T??n</th>
        <th></th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $data)
      
    <tr>
        <td>{{$data['khoa']}}</td>
        
        <td><a href="{{URL::to('delete-khoa',$data['_id'])}}" class="material-icons">delete</a><a class="bi bi-pen"></a>  
        </td>
      </tr>
    
      @endforeach
    </tbody>
  </table>
</div>




<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
<p>S???n ph???m ???????c l??m b???i  <a href="https://thq2776.github.io/LTWb1/">https://thq2776.github.io/LTWb1/</a></p> 
</footer>

</body>
</html>
