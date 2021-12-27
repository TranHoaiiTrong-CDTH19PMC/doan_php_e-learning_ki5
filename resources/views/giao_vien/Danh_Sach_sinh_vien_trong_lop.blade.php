
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style_request2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="./js/Collapse_sidebar.js"></script>
    <title>Lớp học</title>
 
</head>
<body>
   
<div class="container">
  <table class="table">
    <h2>Danh sách sinh viên trong lớp {{App\Models\lophoc::where("id","$cc->id")->first()->tenlop}}</h2><br/>
    <h5>   @if (session('thanhcong'))
            <div class="alert alert-success" style="color: black">
                {{ session('thanhcong') }}
            </div>
            @endif    </h5>
<form class="modal-content animate" action="{{route('xl_tim_kiem_sinh_vien_trong_lop',['id'=>$cc->id])}}" autocomplete="off" method="post">
            {{csrf_field()}}
            <div class="container">
               <div>
            </div>
            <div class="input-group">
                <label for="pw2"><b>Tìm kiếm sinh viên trong lớp </b></label>
                <input id="keywords" style="min-width: 80vw;" type="text" placeholder="Tìm kiếm sinh viên" name="timkiem" >
                <div id="search_ajax"></div>
            </div>
               
            <div class="clearfix">
            <h3>  @if (session('error'))
                                    <div class="alert alert-danger" style="color: red">
                                        {{ session('error') }}
                                    </div>
                                    @endif  </h3>
            
                <button type="submit" class= "btnOnClick">Tìm kiếm</button>
                
            </div>
            </div>
        </form>
    <a href="{{route('ds_lop')}}"> <i class="fas fa-backspace"></i></a></br>
 
    <a href="{{route('them_sinh_vien_vao_lop',['id'=>$cc->id])}}"><i class="far fa-plus-square"></i></a>
        <tr>
            <th>Tên sinh viên </th>
            <th>MSSV </th>
            <th>Email </th>
           <th>Chức năng</th>
           <th></th>
        </tr>
            @foreach($ds as $p)
                @if($p->pivot->cho_hay_khong==1)
                    <form  action="{{route('xl_Danh_sach_sinh_vien_trong_lop',['sinhvien_id'=>$p->pivot->sinhvien_id,
                        'lophoc_id'=>$p->pivot->lophoc_id])}}" method="post">
                    @csrf
                    <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->mssv}}</td>
                    <td>{{$p->email}}</td>
                <td> <button type="submit" class= "btnOnClick">Cho ra khỏi lớp</button></td>
                    </form>
                
                </tr>
                    @endif
            @endforeach
  </table>
</div>
    </body>
</html>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/
   sdk. js#xfbml=1&version=v6.0&appId-2339123679735877&autoLogAppEvents=1"></script>
<script type="text/javascript">
  $('#keywords').keyup(function(){
    var query=$(this).val();
    if(query!='')
    {
      var _token=$('input[name="_token"]').val();
      $.ajax({
        url:"{{url('/autocomplete')}}",
        method:"POST",
        data:{query:query,_token:_token},
        success:function(data){
          $('#search_ajax').fadeIn();
          $('#search_ajax').html(data);
        }
      });
    }else{
      $('#search_ajax').fadeOut();
    }
  });
$(document).on('click','li',function(){
  $('#keywords').val($(this).text());
  $('#search_ajax').fadeOut();
});
</script>




 