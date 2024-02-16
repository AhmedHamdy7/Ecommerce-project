<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\product;

class AdminController extends Controller
{

    public function addProduct(){
// dd('adsa');
        return view('admin.product');

    }

    public function uploadProduct(Request $request){
        $request->validate([
            'title'=>'required|max:50',
            'price'=>'required|',
            'desc'=>'required',
            'quantity'=>'required',
            'file'=>'required|mimes:jpeg,png,jpg',
        ],[
            'title.required' => __('title is required'),
            'price.required' =>  __('price is required'),
            'desc.required' =>  __('description is required'),
            'quantity.required' => __('quantity is required'),
            'file.required' => __('file is required'),

        ]);
        $data = new product;

        $image  = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('storage/app/public/images' , $imagename);
        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message' , 'product added successfuly');
    }

    public function showProduct(){
        $data =product::all();
        return view('admin.showProduct',compact('data'));
    }

    public function deleteProduct($id){
        $data =product::find($id);
        $data->delete();
        return redirect()->back()->with('message' ,'Product deleted successfuly');
    }

    public function updateView($id){
        $data =product::find($id);
        return view('admin.updateView' ,compact('data'));

    }

    public function UpdateProduct(Request $request ,$id){
        $request->validate([
            'title'=>'required|max:50',
            'price'=>'required|',
            'desc'=>'required',
            'quantity'=>'required',
            'file'=>'required|mimes:jpeg,png,jpg|max:2048',
        ],[
            'title.required' => __('title is required'),
            'price.required' =>  __('price is required'),
            'desc.required' =>  __('description is required'),
            'quantity.required' => __('quantity is required'),
            'file.required' => __('file is required'),

        ]);
        $data =product::find($id);

        $image  = $request->file;
        if ($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('storage/app/public/images' , $imagename);
            $data->image = $imagename;
        }

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;

        $data->save();

        return redirect()->back()->with('message' , 'product updated successfuly');
    }
}


