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

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<h2 style="text-align: center; padding-top: 0px;">Thông tin sinh viên</h2>
  <?php $id = Session::get('_id');
        $index = Session::get('index');
  ?>
<form action="{{URL::to('/update',$id)}}" method="POST" enctype="multipart/form-data" >
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
    <td><input type="text" value="{{$data['name']}}" name="name"></td>
    </tr>
    <tr>
      <td><label for="">Hình ảnh:</label></td>
      <td><input type="file" value="{{$data['image']}}" name="image">
      <img style="width: 100px; height:100px;margin-left: 15px;" src="{{URL::to('public/backend/'.$data['image'])}}" ></td>
</tr>
<tr>
      <td><label for="">Email:</label></td>
      <td><input type="email" value="{{$data['email']}}" value="" name="email">
      </td>
</tr>
<tr>
      <td><label for="">Mật Khẩu:</label></td>
      <td><input type="text" value="{{$data['password']}}" name="password">
      </td>
</tr>
<tr>
      <td><label for="">Sdt:</label> </td>
      <td><input type="number"  value="{{$data['phone']}}"name="phone">
      </td>
</tr>
<tr>
      <td><label for="">Địa chỉ:</label> </td>
      <td><input type="text"  value="{{$data['address']}}"name="address">
      </td>
</tr>
@if($data['index']!=1)
<tr>
      <td><label for="">Mssv:</label> </td>
      <td><input readonly type="text" value="{{$data['mssv']}}" name="mssv">
      </td>
</tr>
<tr>
      <td><label for="">Lớp:</label></td>
      <td><input readonly type="text" value="{{$data['lop']}}" name="lop">
      </td>
</tr>
@endif


<tr>
      <td><label for="">Dân tộc:</label></td>
      <td><input type="text" value="{{$data['dantoc']}}" name="dantoc">
      </td>
</tr>
<tr>
      <td><label for="">CMND/CCCD:</label> 
    </td>
      <td><input type="text" value="{{$data['cmnd']}}" name="cmnd">
      </td>
</tr>
<tr>
      <td><label for="">Năm sinh:</label>
    </td>
      <td><input type="date" value="{{$data['namsinh']}}" name="namsinh">
      </td>
</tr>
<tr>
      <td><label for="">Giới tính:</label>  
    </td>
      <td> <select style="color: black;margin-left: 15px;" name="gioitinh" class="form-select" aria-label="Default select example">
                   @if ($data['gioitinh'] == 'Nam' || $data['gioitinh'] == null)
                    <option select value="Nam">Nam</option>
                    <option value="Nu" >Nữ</option>
                    @else
                    <option select value="Nu" >Nữ</option>
                    <option  value="Nam" >Nam</option>
                    @endif
            </select>
      </td>
</tr>
<tr>
      <td><label for="">Chuc Vu:</label> 
    </td>
      <td>@if($data['index']==1)
            <input type="text" readonly  value="Giao Vien"><br>
            <input type="hidden" value="1" name="index" ><br>
            @else
            <input type="text" readonly  value="Sinh vien"><br>
            <input type="hidden" value="2" name="index" ><br>
            @endif
      </td>
</tr>      
<tr>
      <td></td>
      <td><button style="color: black;margin-left: 15px;" type="submit" name="">Cập nhật</button></td>
</tr>      
      
    </tbody>
  </table>
            
        </form>
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
<p>Sản phẩm được làm bởi  <a href="https://thq2776.github.io/LTWb1/">https://thq2776.github.io/LTWb1/</a></p> 
</footer>

</body>
</html>
