<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center;">Thông tin cá nhân</h1>
    <table class="table" style="text-align: left;">
    <thead>
      <tr >  
        <th><img style="width: 250px; height:250px;" src="{{URL::to('public/backend/'.$data['image'])}}" ></th>
        <th >
        <h3 style="margin-inline-start: 50px;">Họ Tên: {{$data['name']}}</h3>
        <h3 style="margin-inline-start: 50px;">Năm sinh: {{$data['namsinh']}}</h3>
        <h3 style="margin-inline-start: 50px;">Giới Tính: {{$data['gioitinh']}}</h3>
        
        
        <h3 style="margin-inline-start: 50px;">Lớp: {{$data['lop']}}</h3>
        <h3 style="margin-inline-start: 50px;">Địa Chỉ: {{$data['address']}}</h3>
        <h3 style="margin-inline-start: 50px;">SDT:{{$data['phone']}}</h3>
       
    </th>
        
      </tr>
    </thead>
  </table>
  <h3 style="margin-inline-start: 50px;">Email: {{$data['email']}}</h3>
  <h3 style="margin-inline-start: 50px;">Mật Khẩu: {{$data['password']}}</h3>
</body>
</html>