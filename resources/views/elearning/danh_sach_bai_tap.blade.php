@extends('elearning/chi_tiet_lop_hoc')


@section('chuc_nang_bai_tap')
<ul class="navbar-nav">
            <li class="nav-item dropdown">
               <a class="nav-link avatar "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
               </a>
             <div class="dropdown-menu dropdown-menu-right" >
           <a class="dropdown-item" href="{{route('chitietlophoc',['id'=>$lophoc->id,'loaibai'=>1])}}">Bảng tin </a>
               <a class="dropdown-item" href="{{route('baitap',['idlophoc'=>$lophoc->id])}}">Thêm bài tập</a>
              
             </div>
             
            </li>
         </ul>
@endsection