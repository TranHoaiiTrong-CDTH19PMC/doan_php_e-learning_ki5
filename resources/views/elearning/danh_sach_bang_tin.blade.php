@extends('elearning/chi_tiet_lop_hoc')


@section('chuc_nang_bai_tap')
<ul class="navbar-nav">
            <li class="nav-item dropdown">
               <a class="nav-link avatar "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
               </a>
             <div class="dropdown-menu dropdown-menu-right" >
           <a class="dropdown-item" href="{{route('chitietlophoc',['id'=>$lophoc->id,'loaibai'=>2])}}">Bài tập trên lớp </a>
               <a class="dropdown-item" href="{{route('Danh_sach_sinh_vien_trong_lop',['id'=>$lophoc->id])}}">Mọi người</a>
              
             </div>
             
            </li>
         </ul>
         @endsection
@section('form_thembangtin')
<form action="{{route('xl_thembaigiang',['id'=>$lophoc->id,'loaibai'=>1])}}" 
method ="POST" enctype="multipart/form-data"  class="modal-content animate"
style="border:none">
            @csrf
                  <div class="row position-relative"> 
                  <input type="text" class="w-100 input-content" placeholder="Thông báo nội dung nào đó cho lớp học của bạn" name="noidung">
                      <span class="floating-label">Nhập thông báo của bạn</span>
                    <div class="button-wrapper" style="position: absolute; top: 62%;left: 2%;">
                          <span class="label">
                            Upload File
                          </span>
                            <input type="file"  id="upload" class="upload-box" placeholder="Upload File"  name="file_pdf">
                        </div> 
                        <button type="submit" style="position: absolute; top: 62%;right: 2%;" class="input-submit">Gửi</button>
                  </div>
                </form>
 @endsection