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
        
        <li><a href="{{URL::to('/add')}}">Thêm sinh viên</a></li>
        <li><a href="{{URL::to('/lop')}}">Thêm lớp</a></li>
        <li><a href="{{URL::to('/khoa')}}">Thêm khoa</a></li>
        <li><a href="{{URL::to('/view')}}">Xem thông tin sinh viên</a></li>
        @endif
        @if ($id)
        <li><a href="{{URL::to('/profile',$id)}}">{{$name}}</a></li> 
        <li><a href="{{URL::to('/logout')}}">Đăng Xuất</a></li>
        @else
        <li><a href="{{URL::to('/login')}}">Đăng nhập</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 ">
<form action="{{URL::to('/search')}}" method="GET">
  <input name="search" style="color: black;" type="text"> <button style="color: black;" type="submit" > Tim</button>
  </form>
  </form>
   <form action="{{URL::to('/in')}}" method="POST">
    {{csrf_field()}}
    <label for="">Khoa:</label>     
            <select style="color: black;" name="khoa" class="form-select" aria-label="Default select example">
                    <option selected>Chon khoa</option>
                    @foreach ($data1 as $key => $value)
                    <option value="{{$value['_id']}}" >{{$value['khoa']}}</option>
                    @endforeach
                </select>
                <label for="">Lop:</label> 
                <select style="color: black;" name="lop" class="form-select" aria-label="Default select example">
                
                </select>
   <button style="color: black;" type="submit" >Xem danh sách sinh viên</button>
  </form> 
<h2 style="text-align: center">Thoông tin sinh viên</h2>
              
  <table class="table">
    <thead>
      <tr>
        
        <th>Ten</th>
        <th>MSSV</th>
        
        <th>SDT</th>
        <th>DIA CHI</th>
        
        <th></th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($data as $key => $data)
      @if ($data['index'] == 2)
    <tr>
    
       
        <td>{{$data['name']}}</td>
        <td>{{$data['mssv']}}</td>
        
        <td>{{$data['phone']}}</td>
        <td>{{$data['address']}}</td>
        
        <td><a href="{{URL::to('delete',$data['_id'])}}" class="material-icons">delete</a><a class="bi bi-pen"></a>
        
        </td>


      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
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
<p>Sản phẩm được làm bởi  <a href="https://thq2776.github.io/LTWb1/">https://thq2776.github.io/LTWb1/</a></p> 
</footer>

</body>
</html>
