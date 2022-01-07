<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style_request2.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <title>Thêm lớp học</title>
</head>
<body class="background-color1">
    <div class="">
        <form action="{{route('xl_taipdf')}}" method ="POST" enctype="multipart/form-data"  class="modal-content animate">
           @csrf
        <div class="container">
               
                    <input type="hidden" name="id" value="">
                    <h1>Thêm lớp học mới</h1>
                    <a href="{{route('ds_lop')}}"> <i class="fas fa-backspace"></i></a></br>
                  
                    
                    <div class="mb-3">
                    <label for="class_code"><b>Hình nền</b></label>
                        <div class="input-group">
                        <input  type="file" class="form-control" id="class_code" placeholder="Hình nền" name="file_pdf" >
                        </div>
                        @error('hinh_nen')
                        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                        @enderror  
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Thêm lớp Học</button>                 
             
            </div>
        </form>

    </div> 


    
</body>
</html>