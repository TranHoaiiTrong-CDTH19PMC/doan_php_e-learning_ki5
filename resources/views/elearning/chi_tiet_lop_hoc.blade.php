
<!doctype html>
<html lang="en">
  <head>
    <title>    {{$lophoc->tenlop}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>
      <style>

          .box{
              min-height: 50px;
              position: relative;
              border-radius: 10px;
              border: 1px solid rgb(189, 188, 188);
          }
          .content-course{
              position: absolute;
              top:60%;
              left: 5%;
          }
          .bg-main{
            background-image: url("https://gstatic.com/classroom/themes/img_learnlanguage.jpg");
            max-height: 500px;
            height: 300px;
          }
          .name-course{
              font-size: 30px;
              color: white;
              font-weight: 600;
          }
          .time-course{
              font-size: 25px;
              color: white;
          }
          .input-content{
  float: right;
  height: 130px;
  margin-top: 5px;
  text-align: left;
  text-indent: 5px;
  font-size: 12.6pt;
  border-radius: 5px;
  border: solid 1.5px #D3D3D3;
  -webkit-transition: 1s; /* Safari */
  transition: 1s;
  box-shadow: 0 0 2pt 1pt #D3D3D3;
padding-left: 20px;
          }
          .input-content1{
  float: right;
  height: 40px;
  margin-top: 5px;
  text-align: left;
  text-indent: 5px;
  font-size: 12.6pt;
  border-radius: 5px;
  border: solid 1.5px #D3D3D3;
  -webkit-transition: 1s; /* Safari */
  transition: 1s;
  box-shadow: 0 0 2pt 1pt #D3D3D3;
padding-left: 20px;
          }

          input[type=text]:hover{
  box-shadow: 0 0 5pt 0.5pt #D3D3D3;
}
input[type=text]:focus {
  box-shadow: 0 0 7pt 4pt #D3D3D3;
  outline-width: 0px;
}
.icon-homework{
    background-color: rgb(90, 90, 228);
    padding: 15px;
    border-radius: 100%;
}
.new-homework{
  padding-top: 20px;
  padding-bottom: 10px;
  padding-right: 20px;
}
.fa-file-word{
    color: white;
    font-size: 22px;
}
.new-homework:hover{
    background-color: rgb(213, 213, 250);
}


.button-wrapper {
  position: relative;
  text-align: center;
}

.button-wrapper span.label {
  position: relative;
  z-index: 0;
  display: inline-block;
  width: 100%;
  background: #00bfff;
  cursor: pointer;
  color: #fff;
  padding: 10px 5px;
  text-transform:uppercase;
  font-size:12px;
}

#upload {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 50px;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}
.floating-label {
  position: absolute;
  pointer-events: none;
  left: 20px;
  top: 18px;
  transition: 0.2s ease all;
}
.input-submit{
    padding: 8px 15px;
    background-color: green;
    border: none;
    color: white;
}
      </style>
    <div class="container mt-3">
    @yield('chuc_nang_bai_tap')      
  
        <div class="row">
            <div class="col-12">
                <div class="box bg-main">
                    <div class="content-course">
                        <p class="name-course">
                        {{$lophoc->tenlop}}</p>
                        <p class="time-course"> {{$lophoc->tieude}}</p>
                    </div>
                </div>
            </div>
        </div>
        @if (session('error'))
      <div class="alert alert-success" style="color: black">
          {{ session('error') }}
      </div>
      @endif  
      @if (session('loicomment'))
      <div  style="color: red">
          {{ session('loicomment') }}
      </div>
      @endif
        <div class="row mt-4">
            <div class="col-3">
                <div class="box p-2">
                    <div class="d-flex">
                        <div class="p-2">
                            <img src="https://fonts.gstatic.com/s/i/productlogos/meet_2020q4/v6/web-48dp/logo_meet_2020q4_color_1x_web_48dp.png" alt=""
                            style="width: 30px;height: 30px;">
                        </div>
                        <div class="p-2 text-center">
                            <span style="font-size: 18px;">Meet</span>
                        </div>

                        <div class="ml-auto p-2">
                            <i class="fas fa-angle-double-down"></i>
                        </div>
                      </div>
                          <button class="btn btn-primary w-100"  >Tham gia</button>
                </div>
            </div>
           
            <div class="col-9">
            @yield('form_thembangtin')     
              @foreach($baigiang as $p)
               <div class="row mt-4">
                <div class="box w-100  new-homework">
                    <div class="d-flex">
                        <div class="p-2 d-flex">
                 <div class="col-3">
                    <span class="icon-homework">
                        <i class="fal fa-file-word "></i>
                      </span>
                 </div>
                 <div class="col-9" style="margin-top: -13px; min-width: 500px;margin-left: -70px;">
                 <span class="d-flex"><b>

                   {{App\Models\account::find(App\Models\lophoc::find($p->lophoc_id)->giangvien_id)->name}}
                   @if(App\Models\baigiang::find($p->id)->loaibai_id==1)
                   đã đăng thông báo mới :  
                   @else
                   đã giao bài tập mới :
                   @endif
                  
                   {{$p->noidung}}
                  </b> </span>
                     @if($p->created_at->format('d/m/Y')==date('d/m/Y'))
                     <small>{{$p->created_at->format('H:i:s')}}</small>
                        @else
                  <small>{{$p->created_at->format('d/m/Y')}}</small>
                @endif
              
       @if(!empty(App\Models\tepdinhkem::where("baigiang_id","$p->id")->first()->linktep))
        <a class="dropdown-item" href="{{route('chayFilePDF',['text'=>App\Models\tepdinhkem::where('baigiang_id',$p->id)->first()->linktep])}}">Tệp đính kèm</a>
       @endif
            </div>
                        </div>
                        <div class="ml-auto p-2">
                        @if($p->created_at!=$p->ngayhethan)
                          Ngày hết hạn
                          <small>{{$p->ngayhethan}}</small>
                         @endif
          
                <ul class="navbar-nav">
            <li class="nav-item dropdown">
               <a class="nav-link avatar "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
               </a>
             <div class="dropdown-menu dropdown-menu-right" >
               <a class="dropdown-item" href="#">Chỉnh sửa</a>
             
               <a class="dropdown-item confirmation" href="{{route('xoabaigiang',['idbaigiang'=>$p->id])}}">Xoá</a>
              
             </div>
             
            </li>
         </ul>
                        </div>
                      </div>
                  </div>
                  <div class="col-12">
                    <p>Nhận xét về lớp học </p> </div>
                
                  @foreach(App\Models\comment::where("baigiang_id","$p->id")->get() as $coment)  
                   <div class="col-9" style="margin-top: 13px; min-width: 500px;margin-left: 0px;">
                   <b>{{App\Models\account::find($coment->account_id)->name}}</b>
                   @if($coment->created_at->format('d/m/Y')==date('d/m/Y'))
                     <small>{{$coment->created_at->format('H:i:s')}}</small>
                        @else
                  <small>{{$coment->created_at->format('d/m/Y')}}</small>
                @endif
               
                <span class="d-flex">{{$coment->noidung}} </span>
                </div>
              
                <ul class="navbar-nav">
            <li class="nav-item dropdown">
               <a class="nav-link avatar "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
               </a>
             <div class="dropdown-menu dropdown-menu-right" >
               <a class="dropdown-item" href="{{route('doi_thong_tin')}}">Chỉnh sửa</a>
             
               <a class="dropdown-item confirmation" href="{{route('xoabinhluan',['id'=> $coment->id,'idaccount'=>App\Models\account::find($coment->account_id)->id])}}">Xoá</a>
              
             </div>
             
            </li>
         </ul>
                  @endforeach
                  <form action="{{route('thembinhluan',['id'=>$p->id])}}" method ="POST" enctype="multipart/form-data"  class="modal-content animate" style="border:none"> 
           @csrf
                <div> 
                  <input type="text" class="w-100 input-content1" placeholder="Thêm nhận xét trong lớp học" name="comment">
                      <button type="submit" style="position: absolute; top: 30%;right: 2%;" ><i class="fa fa-send"></i></button>
                </div>
              </form>
               </div>
               @endforeach  
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Bạn có chắc chắn muốn xóa?');
    });
</script>
