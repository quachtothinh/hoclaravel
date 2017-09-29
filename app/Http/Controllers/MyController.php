<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class MyController extends Controller
{
    //
    public function XinChao() {
    	echo "Xin chao cac ban";
    }
    public function KhoaHoc($ten)
    {
    	echo 'Khoa hoc '.$ten;
    	return redirect()->route('MyRoute2');
    }
    public function GetURL(Request $request)
    {
    	//return $request->path();
    	//return $request->url();
    	/*if($request->isMethod('post'))
    		echo "Day la phuong thuc Post";
    	else echo "Ko phai la phuong thuc Post";*/

    	if($request->is('My*'))
    		echo "Co tu My o trong request";
    	else echo "Khong co tu My o trong request";
    }
    public function postForm(Request $request)
    {
    	/*echo "Ten cua ban la: ";
    	 echo $request->HoTen;*/

    	 //Kiem tra co tham so tuoi hay khong
    	/* if($request->has('Tuoi')) 
    		echo 'Co tham so tuoi';
    	else 
    		echo 'Khong co tham so Tuoi';*/

    	//Nhan du lieu tu the input voi name la HoTen
    	echo $request->input('HoTen');
    }

   
    public function setCookie()
    {
    	 //Tao cookie
    	$response = new Response();
    	$response->withCookie('khoahoc', 'Laravel - Khoa Pham', 0.1);
    	echo "Tao cookie thanh cong";
    	return $response;
    }

    public function getCookie(Request $request)
    {
    	//Lay gia tri cookie khoahoc
    	echo "Gia tri cookie cua ban la: ";
    	return $request->cookie('khoahoc');
    }

    //Xu ly Upload file post file tu view dua vao
    public function postFile(Request $request) {
    	//kiem tra xem co file hay chua
    	if($request->hasFile('myFile'))
    	{
    		//luu vao bien file
    		$file = $request->file('myFile');

    		//lay dinh dang file
	    	//echo $file->getMimeType('myFile');

	    	//tra ve dung luong tinh theo byte
	    	echo $file->getClientSize('myFile');
	    	// if($file->isValid('myFiile')) 
	    	// {
	    	// 	echo "ddd";
	    	// }
    		//Kiem tra phan mo rong cua file co phai la JPG hay khong
    		if($file->getClientOriginalExtension('myFile') == "jpg")
    		{
    			//luu vao bo nho bang lenh move voi 2 tham so la noi luu va ten 
	    		//$file->move('img', 'myFile.jpg');	    		
	    		
	    		//lay ten mac dinh cua file upload
	    		$filename = $file->getClientOriginalName('myFile');
	    		//luu voi ten mac dinh
	    		$file->move('img', $filename);
	    		echo "Da luu file :".$filename;

    		}
    		else 
    		{
    			echo "File khong duoc phep";
    		}
    		


    	}
    	else 
    		echo "Chua co file";
    }

    //Json
    public function getJson()
    {
    	//tao mang
    	//$array = ['Laravel', 'PHP', 'Javascript', 'HTML'];
    	$array = ['KhoaHoc'=>'Laravel - Khoa Pham'];
    	//Xuat mang ra dang Json
    	return response()->json($array);
    }

    //View
    public function myView()
    {
    	//goi view file myview.php
    	//return view('myview');
    	//goi view file khoapham.php trong thu muc View
    	return view('view.KhoaPham');
    }

    //Truyen bien qua View
    public function Time($t)
    {
    	//truyen bien $t vao tham so time qua view
    	return view('myview', ['time'=>$t]);
    }

    //Truyen du lieu vao blade template
    public function blade($str)
    {
        $khoahoc = "<b>Laravel - Khoa Pham</b>";
       // $khoahoc = '';
        if($str == 'laravel')
            return view('pages.laravel', ['khoahoc' => $khoahoc]);
        elseif($str == 'php')
            return view('pages.php', ['khoahoc' => $khoahoc]);
    }

    //DIeu kien trong laravel
    public function dieukien($str)
    {
        $string = "Dieu kien";
        return view('pages.dieukien', ['str'=>$string]);
    }
}
