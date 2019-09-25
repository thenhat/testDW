<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class DemoController extends Controller
{
    public function getAdd()
    {
        return view('student.survey');

    }

    public function postAdd(Request $request){
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "name" => "required|string|max:255|unique:student",
            "email"   => "required",
            "telephone"=> "required",
            "feedback"=> "required",
        ];
        $this->validate($request,$rules,$messages);
        try{
            Student::create([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "telephone"=> $request->get("telephone"),
                "feedback"=> $request->get("feedback"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("student/survey")->with('success','Survey Succeed');
    }
}
