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
      color: black;
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
  
<style>
  
  .text-center{
    text-align: left;
  }
  input {
    width: 400px;
    height: 30px;
    margin: 0 0 0 15px;
  }
</style>

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
        <li><a href="{{URL::to('/login')}}">????ng nhap</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<h1 style="text-align: center">Th??ng tin v??? Khoa</h1>
  <a href="{{URL::to('/show-khoa')}}" style="color: black">Xem danh s??ch khoa</a><br>
  <?php $messages = Session::get('message');
    echo $messages;
                ?>
  
<form action="{{URL::to('/save-khoa')}}" method="POST" >
              
              {{csrf_field()}}
          <label for="">T??n Khoa:</label>     <input type="text" name="khoa"><br>
             
          <br>
          <button type="submit" name="">Th??m Khoa</button>
          </form>
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
<p>Bootstrap Theme Made By <a href="https://thq2776.github.io/LTWb1/">https://thq2776.github.io/LTWb1/</a></p> 
</footer>

</body>
</html>
