<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style_request2.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Bài tập</title>
</head>
<body class="background-color1">
    <style>
        
.modal-dialog-full-width {
  width: 100% !important;
  height: 100% !important;
  margin: 0 !important;
  padding: 0 !important;
  max-width:none !important;

}

.modal-content-full-width  {
  height: auto !important;
  min-height: 100% !important;
  border-radius: 0 !important;
  background-color: #ececec !important 
}

.modal-header-full-width  {
  border-bottom: 1px solid #9ea2a2 !important;
}

.modal-footer-full-width  {
  border-top: 1px solid #9ea2a2 !important;
}
.content{
  padding:30px;
}
.close{
margin-right: 10px;
margin-bottom: 8px;
color: white;
}
.avatar{
  font-size: 35px;
  margin-bottom: 5px;
}
.Join{
  font-size: 35px;
  margin-right: 20px;
  color:rgb(255, 255, 255);
  margin-bottom: 5px;

}
.Join:hover{
  color: silver;
}
.sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(255, 255, 255);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }
  
  .sidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    transition: 0.3s;
  }
  
  .sidebar a:hover {
    color: #00cfeb;
  }
  
  .sidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  .openbtn {
    font-size: 20px;
    color:red;
  }
  
  .openbtn:hover {
    background-color:silver;
  }
  
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
  }
  .container-fluid{
      margin-top: 20px;
  }
  .cel{
    margin-top: 20px;
  }
  .card-img{
    height: 230px;
    width: 800px;
  }
  
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  .modal_FormCreateClass {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }
  .modal-content1 {
    background-color: #ffffff;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 35%; /* Could be more or less, depending on screen size */
  }
  
  /* Nội dung from Tạo lớp học*/

  .cancelbtn {
    padding: 10px 20px;
    background-color: #f44336;
    border:none;
  }
  .cancelbtn, .btn_CreateClass {
    float: left;
    width: 50%;
  }
  .cancelbtn:hover,.btn_CreateClass:hover {
    background-color: rgb(10, 197, 230);
    opacity: 0.8;
  }
  .container {
    padding: 16px;
  }
  .iConDropdown{
    margin-left: 20px;
  }
  
  
  .content {
      position: fixed;
      bottom: 0;
      width: 100%;
      top:0;
    }
    h2{
      text-align: center;
    }
    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    /* Set a style for all buttons */
    button {
      background-color: #555354;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      background-color: rgb(10, 197, 230);
      opacity: 0.8;
    }
    
    /* Extra styles for the cancel button */
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }
    
    /* Center the image and position the close button */
    .imgcontainer {
      text-align: center;
      margin: 20px 0 12px 0;
      position: relative;
    }
    
    img.avatar {
      width: 25%;
      border-radius: 50%;
    }
    
    .container {
      padding: 16px;
    }
    
    span.psw {
      padding-top: 20px;
    }
    .colortext
    {
      color: red;
    }

    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
      padding-top: 60px;
    }
    
    /* Modal Content/Box */
    .modal-content {
      background-color: #ffffff;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 35%; /* Could be more or less, depending on screen size */
    }
    
  
    
    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }
    
    /* Add Zoom Animation */
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }
    
    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)} 
      to {-webkit-transform: scale(1)}
    }
      
    @keyframes animatezoom {
      from {transform: scale(0)} 
      to {transform: scale(1)}
    }
    
    .cancelbtn {
      padding: 14px 20px;
      background-color: #f44336;
    }
    .cancelbtn, .signupbtn {
      float: left;
      width: 50%;
    }
    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
    @media screen and (max-width: 300px) {
      .cancelbtn, .signupbtn {
         width: 100%;
      }
    }
   .background-color1{
     background-color: rgb(59, 66, 66);
   }
    </style>
    <div class="">
    <form action="{{route('xl_thembaigiang',['id'=>$lophoc->id,'loaibai'=>2])}}" method ="POST" enctype="multipart/form-data"  class="modal-content animate">
            @csrf
        <div class="container">
       
                    <input type="hidden" name="id" value="">
                    <h1>Thêm lớp học mới</h1>
                    <a href="{{route('ds_lop')}}"> <i class="fas fa-backspace"></i></a></br>
                    <div class="mb-3">
                        <label for="class_name"><b>Tiêu đề</b></label>
                        <div class="input-group">
                            <input value= "" type="text" class="form-control" id="class_name" placeholder="Tiêu đề (bắt buộc)" name="tieude" required>
                        </div>   
                    </div>
                    <div class="mb-3">
                    <label for="class_code"><b>Hướng dẫn sử dụng</label>
                        <div class="input-group">
                        <input value= "" type="text" class="form-control" id="class_code" placeholder="Không bắt buộc " name="noidung" required>
                        </div>
                    </div>
                    <div class="mb-3">
                    <label for="class_code"><b>Tệp đính </b></label>
                        <div class="input-group">
                        <input  type="file" class="form-control" id="class_code" placeholder="Hình nền" name="file_pdf" >
                        </div>
                    </div>

                    <div class="mb-3">
                    <label for="class_code"><b>Ngày hết hạn </b></label>
                        <div class="input-group">
                        <input type="datetime-local" id="birthdaytime" name="ngayhethan">
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Giao bài</button>                 
             
            </div>
        </form>

    </div> 
    
</body>
</html>
