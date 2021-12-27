<?php

namespace App\Http\Controllers;
use App\Models\account;
use App\Models\lophoc;
use App\Models\lophoc_sinhvien;
use Illuminate\Http\Request;
use App\Http\Requests\GiaoVienRequest;
use App\Http\Requests\themlophocRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ktEmailRequest;
use App\Http\Controllers\window;
class GiangVienController extends Controller
{

    public function guimail()
    {
        $data=[
            "name"=>"quang vinh",
        ];
        Mail::send('elearning/email',$data,function($mes){
            $mes->from("dangquangvinh20188@gmail.com","quang vin gửi 1");
            $mes->to("0306191292@caothang.edu.vn","hihi");
            $mes->subject("Thư gửi mẫu");
        });
    }

    public function kiemtra()
    {
        $user = Auth::user();
        if($user->account_type_id==1)  
        {
            return true;
        }
        else{
            return redirect()->route("trangchu");
        }
    }

    public function ds_lop()
    {
        $user = Auth::user();
        $ds=lophoc::where("giangvien_id","$user->id")->orderBy('id', 'desc')->get();

        return view("giao_vien.giao_vien_main",compact('ds'));
    }

    public function doi_thong_tin()
    {
        $user = Auth::user();
        return view('giao_vien/doi_thong_tin_giao_vien',compact('user'));
    }
    public function xl_doi_thong_tin(GiaoVienRequest $a)
    {
        $user=account::find($a->id);
        $user->name=$a->name;
        $user->username=$a->username;
        $user->email=$a->email;
        $user->avatar=$a->avatar;
        $user->save();
        return redirect()->route("doi_thong_tin")->with('error','Cập nhật thông tin thành công');   
    }
    public function them_lop_hoc()
    {
        $user = Auth::user();
        if($user->account_type_id==1)  
        {
            return view('giao_vien/them_lop_hoc');
        }
        else{
            return redirect()->route("trangchu");
        }
       
    }
    public function xl_them_lop_hoc(themlophocRequest $a)
    {
        $user = Auth::user();
        $lop=new lophoc;
        $lop->giangvien_id=$user->id;
        $lop->tenlop=$a->name;
       $code= rand(10000,99999);
       do{
        $lop->mavaolop=$code;
       $kt= lophoc::where("mavaolop","$code")->count();
       $code= rand(10000,99999 );
       }
       while($kt>0);
    
        $lop->tieude=$a->tieu_de;
        if($a->hinh_nen==null)
        {
            $lop->hinh_nen="a4.jpg";
        }
        else{
            $image=$a->file('hinh_nen');
            $duoi=$a->file('hinh_nen')->extension();
            $file_name=time().'.'.$duoi;
            $path = $image->storeAs('images',$file_name);
            $lop->hinh_nen=$file_name;
        }
        $lop->save();
        return redirect()->route("ds_lop");
    }

    public function sua_lop_hoc($id)
    {
            $user=lophoc::find($id);
            return view("giao_vien/sua_lop_hoc",compact('user'));
    }
    public function xl_sua_lop_hoc(themlophocRequest $a, $id)
    {
        $user=lophoc::find($id);
        if($a->hasFile('hinh_nen'))
        {
            $image=$a->file('hinh_nen');
            $duoi=$a->file('hinh_nen')->extension();
            $file_name=time().'.'.$duoi;
            $path = $image->storeAs('images',$file_name);
            $user->hinh_nen=$file_name;
            $user->tenlop=$a->name;
            $user->mavaolop=$a->ma_vao_lop;
            $user->tieude=$a->tieu_de;
            $user->save();
        }else{
        $user->tenlop=$a->name;
        $user->mavaolop=$a->ma_vao_lop;
        $user->tieude=$a->tieu_de;
        $user->save();
        }
        return redirect()->route("ds_lop")->with('error','Sửa lớp học thành công'); 
    }
    
    public function xl_xoa_lop_hoc( $id)
    {
        $danhsachsinhvien=lophoc_sinhvien::where("lophoc_id",$id)->get();
        foreach($danhsachsinhvien as $p)
        {
            $p->delete();
        }
        $user=lophoc::find($id);
        $user->delete();
        return redirect()->route("ds_lop")->with('error','Xoá lớp học thành công'); 
    }

    public function doi_mat_khau()
    {
        return view("elearning/doi_mat_khau");
    }

    public function xl_doi_mat_khau(Request $a)
    {
        $user = Auth::user();
     
        if(empty($user))
        {
            $ds="Không có tài khoản tồn tại";
           return view('doi_mat_khau',compact('ds'));
        }elseif(Hash::check($a->pw1,$user->password)){
            if($a->pw3==$a->pw2)
            {
                $user->password=Hash::make("$a->pw3");
                $user->save();
                Auth::logout();
                 return Redirect()->route("dang_nhap")->with('error','Đổi mật khẩu thành công mời bạn đăng nhập lại');   
            }
            else{
               return Redirect()->route("doi_mat_khau")->with('xacnhan','Mật khẩu không trùng khớp');   
            }
        }
        else{
            return Redirect()->route("doi_mat_khau")->with('matkhaucusai','Mật khẩu cũ bạn nhập sai');
        }
    }
    public function Duyet_danh_Sach_cho($a)
    {
     
        $cc=lophoc::where("id","$a")->first();
     
        $ds=$cc->danhSachSinhVien;
      
        return view("giao_vien/danh_sach_cho",compact("ds"));
    }

    public function xl_Duyet_danh_Sach_cho($sinhvien_id,$lophoc_id)
    {
        $lop=lophoc_sinhvien::where([["lophoc_id","$lophoc_id"],["sinhvien_id","$sinhvien_id"]])->first();
        $lop->cho_hay_khong=1;
        $lop->save();
        return redirect()->route('Duyet_danh_Sach_cho',['id'=>$lophoc_id]);
    }
    public function Xoa_sinh_vien_trong_danh_sach_cho($sinhvien_id,$lophoc_id)
    {
        $lop=lophoc_sinhvien::where([["lophoc_id","$lophoc_id"],["sinhvien_id","$sinhvien_id"]])->first();
        $lop->delete();
        return redirect()->route('Duyet_danh_Sach_cho',['id'=>$lophoc_id]);
    }

    public function Danh_sach_sinh_vien_trong_lop($a)
    {
        $cc=lophoc::where("id","$a")->first();
        $ds=$cc->danhSachSinhVien;
        return view("giao_vien/Danh_Sach_sinh_vien_trong_lop",compact("ds"),compact('cc'));
    }

    public function xl_Danh_sach_sinh_vien_trong_lop($sinhvien_id,$lophoc_id)
    {
       
        $lop=lophoc_sinhvien::where([["lophoc_id","$lophoc_id"],["sinhvien_id","$sinhvien_id"]])->first();
        $lop->cho_hay_khong=0;
        $lop->save();
        return redirect()->route('Danh_sach_sinh_vien_trong_lop',['id'=>$lophoc_id]);
    }
   public function autocomplete_ajax(Request $req)
  {
     
      $data=$req->all();
      if($data['query']){
        $danhsachtatcasinhvien=account::where("email","LIKE","%".$data['query']."%")
        ->orwhere("name","LIKE","%".$data['query']."%")
        ->orwhere("mssv","LIKE","%".$data['query']."%")->get();
     
        $output='<ul class="dropdown-menu dropdown-menu-right" style="display:block;">';
        foreach($danhsachtatcasinhvien as $key=>$val)
        {
            $output.='
            <li><a class="dropdown-item" href="#">'.$val->email.'</a></li>
            <li><a class="dropdown-item" href="#">'.$val->name.'</a></li>
            <li><a class="dropdown-item" href="#">'.$val->mssv.'</a></li>
            ';
        }   
        $output.='</ul>';
        echo $output;
      }
  }
   public function xl_tim_kiem_sinh_vien_trong_lop(Request $req,$idlophoc)
   {
       $danhsachtatcasinhvien=account::where('mssv',"%$req->timkiem%")
       ->orwhere("name","LIKE","%$req->timkiem%")
       ->orwhere("email","LIKE","%$req->timkiem%")->get();
      
       $cc=lophoc::where("id","$idlophoc")->first();
        $danhsachsinhviencotronglop=$cc->danhSachSinhVien;
        $ds=[];
     foreach($danhsachsinhviencotronglop as $p)
     {
         foreach($danhsachtatcasinhvien as $h)
         {
             if($p->id==$h->id)
             {
                 $ds[]=$p;
                 break;
             }
         }
     }
    if(empty($ds))
    {
      return redirect()->route("Danh_sach_sinh_vien_trong_lop",["id"=>$idlophoc])->with('error','Không tìm thấy kết quả nào mà bạn mong muốn');   
    }
    return view("giao_vien/Danh_Sach_sinh_vien_trong_lop",compact("ds"),compact('cc'));
   }



    public function them_sinh_vien_vao_lop($id)
    {
       
        $ds=lophoc::find($id);
        return view("giao_vien/them_sinh_vien",compact("ds"));
    }
    public function xl_them_sinh_vien_vao_lop(Request $a, $id)
    {
        $dsemail=explode(":", $a->email);
        foreach($dsemail as $email)
         {
        $sinhvien=account::where("email","$email")->first();
        if(empty($sinhvien))
        {
          return redirect()->route("them_sinh_vien_vao_lop",['id'=>$id])->with('error',"Email $email này không hợp lệ");   
        }
        $kt1=lophoc_sinhvien::where([['sinhvien_id',"$sinhvien->id"],
        ['lophoc_id',"$id"]])->count();
       $kt=lophoc_sinhvien::where([['sinhvien_id',"$sinhvien->id"],
       ['lophoc_id',"$id"]])->first();
      if($kt1>0)
      {
        if($kt->id>0 && $kt->cho_hay_khong==1)
        {
          return redirect()->route("them_sinh_vien_vao_lop",['id'=>$id])->with('error',"Email $email đã có trong lớp mời bạn kiểm tra lại nhé");   
        }
      }
     
     if($sinhvien->account_type_id==1){
      
            return redirect()->route("them_sinh_vien_vao_lop",['id'=>$id])->with('error',"Email $email này là của giáo viên mời bạn kiểm tra lại nhé");   
        }
        elseif($sinhvien->account_type_id==3)
        {
            return redirect()->route("them_sinh_vien_vao_lop",['id'=>$id])->with('error',"Email $email này là của Admin mời bạn kiểm tra lại nhé");   
        }
    }
   $dem=0;
      foreach($dsemail as $email)
         {
        $sinhvien=account::where("email","$email")->first();
       $kt=lophoc_sinhvien::where([['sinhvien_id',"$sinhvien->id"],
       ['lophoc_id',"$id"]])->first();
       $kt1=lophoc_sinhvien::where([['sinhvien_id',"$sinhvien->id"],
       ['lophoc_id',"$id"]])->count();
       if($kt1>0)
       {
        if($kt->cho_hay_khong==0 && $kt->id>0)
        {
            $kt->cho_hay_khong=1;
            $kt->save();
           $dem++;
        }
    }else{
            $add=new lophoc_sinhvien;
            $add->lophoc_id=$id;
            $add->sinhvien_id=$sinhvien->id;
            $add->cho_hay_khong=1;
            $add->save();
            $dem++;
        }
    }
         return redirect()->route("Danh_sach_sinh_vien_trong_lop",["id"=>$id])->with('thanhcong',"Bạn đã thêm thành công $dem sinh viên");   
    }
}



