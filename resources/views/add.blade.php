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
        
        <li><a href="{{URL::to('/add')}}">Thêm sinh viên</a></li>
        <li><a href="{{URL::to('/lop')}}">Thêm lớp</a></li>
        <li><a href="{{URL::to('/khoa')}}">Thêm khoa</a></li>
        <li><a href="{{URL::to('/view')}}">Xem thông tin sinh viên</a></li>
        @endif
        @if ($id)
        <li><a href="{{URL::to('/profile',$id)}}">{{$name}}</a></li> 
        <li><a href="{{URL::to('/logout')}}">Đăng Xuất</a></li>
        @else
        <li><a href="{{URL::to('/login')}}">Đăng nhap</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

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
<script>
function validateForm() {
  var a = document.forms["add"]["name"].value;
  var b= document.forms["add"]["email"].value;
  var c = document.forms["add"]["mssv"].value;
  var x = document.forms["add"]["password"].value;
  var y = document.forms["add"]["khoa"].value;
  var z = document.forms["add"]["lop"].value;
  if (x == ""||a==""||b==""||c==""||y==""||z=="") {
    alert("Vui lòng nhập đầy đủ thông tin!");
    return false;
  }
}

</script>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<h1 style="text-align: center;padding-top:0px;">Thêm sinh viên</h1>
    <form name="add" onsubmit ="return validateForm()" action="{{URL::to('/save')}}" method="POST" >
              <?php $messages = Session::get('message');
              $index = Session::get('index');
                echo $messages; ?>
                {{csrf_field()}}
                <table class="table">
    <thead>
      <tr>
        <th></th>  
        <th></th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <td><label for="">Tên:</label></td>
    <td><input type="text"  name="name"></td>
    </tr>
    
<tr>
      <td><label for="">Email:</label></td>
      <td><input type="email"  value="" name="email">
      </td>
</tr>
<tr>
      <td><label for="">Mật Khẩu:</label></td>
      <td><input type="text"  name="password">
      </td>
</tr>

<tr>
      <td><label for="">Mssv:</label> </td>
      <td><input type="text"  name="mssv">
      </td>
</tr>

<tr>
      <td><label for="">Khoa:</label></td>
      <td> <select name="khoa" class="form-select" aria-label="Default select example">
                    <option selected>Chon khoa</option>
                    @foreach ($data as $key => $value)
                    <option value="{{$value['_id']}}" >{{$value['khoa']}}</option>
                    @endforeach
                </select>
      </td>
</tr>
<tr>
      <td><label for="">Lớp:</label></td>
      <td><select name="lop" class="form-select" aria-label="Default select example">
                
              </select>
      </td>
</tr>

<tr>
      <td><label for="">Chuc Vu:</label> 
    </td>
      <td><input type="text" value="Sinh Vien" name="">
        <input type="hidden" value="2" name="index">
      </td>
</tr>      
<tr>
      <td></td>
      <td><button style="color: black;margin-left: 15px;" type="submit" name="">Thêm sinh viên</button></td>
</tr>      
      
    </tbody>
  </table>
    
           
            </form>
</div>

<script type="text/javascript">
    var url = "{{ url('/add1') }}";
    $("select[name='khoa']").change(function(){
        var khoa_id = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                khoa_id: khoa_id,
                _token: token
            },
            success: function(data) {
                $("select[name='lop'").html('');
                $.each(data, function(key, value1){
                    $("select[name='lop']").append(
                      "<option value='" +value1.lop+"' >" +value1.lop+ "</option>"
                    );
                });
            }
        });
    });
</script>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
<p>Bootstrap Theme Made By <a href="https://thq2776.github.io/LTWb1/">https://thq2776.github.io/LTWb1/</a></p> 
</footer>

</body>
</html>
