<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Status;
use App\Models\Type;
use Config, Validator;

class AnimalController extends Controller
{
    public function index() {
        // $products = Product::all();
        $animals = Animal::paginate($this->rp);
        return view('animal/index', compact('animals'));
    }

    var $rp = 5;

    // public function search(Request $request){
    //     $query = $request->q;
    //     if($query){
    //         $products = Product::where('code','like','%'.$query.'%')->orwhere('name','like','%'.$query.'%')->paginate($this->rp);
    //     } else {
    //         $products = Product::paginate($this->rp);
    //     } return view('product/index',compact('products'));
    // }
    
    public function edit($id = null){
        $t = Type::pluck('name','id')->prepend('เลือกรายการ',"");
        $status = Status::pluck('name','id')->prepend('เลือกรายการ',"");
        if($id){
            $animal = Animal::where('id',$id)->first();
            return view('animal/edit')->with('animal',$animal)->with('types',$t)->with('status',$status);
        } else {
            return view('animal/add')->with('types',$t);
            // ->with('status',$status);
        }
    }
    
    public function update(Request $request){
        $rules = array(
            'name' => 'required',
            'type_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        );

        $message = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข'
        );

        $id = $request -> id;
        $temp = array(
            'name' => $request->name,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
        );

        $validator = Validator::make($temp,$rules,$message);
        if($validator->fails()){
            return redirect('product/edit/ '.$id)->withErrors($validator)->withInput();
        }
        $animal = Animal::find($id);
        $animal->name = $request->name;
        $animal->type_id = $request->type_id;
        $animal->status_id = $request->status_id;
        $animal->save();
        return redirect('animal')->with('ok',true)->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    // public function insert(Request $request){
    //     $product = new Product();
    //     $product->code = $request->code;
    //     $product->name = $request->name;
    //     $product->category_id = $request->category_id;
    //     $product->price = $request->price;
    //     $product->stock_qty = $request->stock_qty;
    //     $product->save();
    //     if($request->hasFile('image')){
    //         $f = $request->file('image');
    //         $upload_to = 'upload/images';

    //         $relative_path = $upload_to.'/'.$f->getClientOriginalName();
    //         $absolute_path = public_path().'/'.$upload_to;

    //         $f->move($absolute_path, $f->getClientOriginalName());

    //         $product->image_url = $relative_path;
    //         $product->save();
    //     }
    //     return redirect('product')->with('ok',true)->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    // }

    // public function remove($id){
    //     Product::find($id)->delete();
    //     return redirect('product')->with('ok',true)->with('msg','ลบข้อมูลสำเร็จ');
    // }
}
