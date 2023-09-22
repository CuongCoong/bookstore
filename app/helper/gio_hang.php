<?php
namespace App\helper;

//tạo lớp
class gio_hang{
    
        public $gio_hang =[];
        public $tong_tien = 0;
        public $tong_so_luong=0;
    
    public function __construct()
    {
        
        $this->gio_hang= session('gio_hang') ? session('gio_hang') :[];
       
      $this->tong_tien = $this->tong_tien();
        $this->tong_so_luong =$this->tong_sl();
    
    }
    
        public function them($sp,$so_luong = 1)
        {
            //kiểm tra giỏ hàng
            if(isset($this->gio_hang[$sp->id])){
                $this->gio_hang[$sp->id]['so_luong']+= $so_luong;
            }else{
            $hang=[
                'id'=>$sp->id,
                'ten_sach'=>$sp->name,

                'gia'=>$sp->sale_price ? $sp->sale_price : $sp->price,
                'anh'=>$sp->avatar,
                
                'so_luong'=>$so_luong
            ];
        
            $this->gio_hang[$sp->id]=$hang;
            
        }
        session(['gio_hang'=>$this->gio_hang]);
            
        }
        public function sua($id,$so_luong)
        {
        
            if(isset($this->gio_hang[$id])){
                if($so_luong>0){
                $this->gio_hang[$id]['so_luong']= $so_luong ;
                session(['gio_hang'=>$this->gio_hang]);}
                else{
                    $this->gio_hang[$id]['so_luong']=1;
                    session(['gio_hang'=>$this->gio_hang]);
                }
            }
            
            
        }
        public function xoa($id)
        {
            unset($this->gio_hang[$id]);
            session(['gio_hang'=>$this->gio_hang]);
        }
        public function huy()
        {
            $this->gio_hang = [];
            session(['gio_hang'=>$this->gio_hang]);
        }
        public function tong_tien()
        {

            
            $tong_tien=0;
            foreach($this->gio_hang as $hang){
             $sl= $hang['so_luong']; $gia=$hang['gia'];
           $tong_tien=   $this->tong_tien += $gia* $sl;
            }
            return $tong_tien;
        }
        public function tong_sl()
        {
            
            $tong_so_luong=0;
            foreach($this->gio_hang as $hang){
    
         $tong_so_luong=   $this->tong_so_luong += $hang['so_luong'];
            }
            return $tong_so_luong;
        }
    }
    





    