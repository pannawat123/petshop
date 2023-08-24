<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use Config, Validator;

class TypeController extends Controller
{
    public function index()
    {
        $types = type::all();
        return view('type/index', compact('types'));
    }

    public function search(Request $request) {
        $query = $request->q;
        
        if($query) {
        $types = type::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('id', 'LIKE', '%' . $query . '%')
        ->get();
        } else {
            $types = type::all();
        }


        return view('type/index', compact('types'));
    }

    public function edit ($id = null) {

        if ($id) {
            //edit view
               $types = type::find($id); return view('type/edit')
               ->with('types', $types);
          } else {
               //add view
               return view('type/add');
          }
    }

    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required',
        );

        $messages = array(
            'required' => 'ข้อมูล :attribute จำเป็นต้องกรอก',
            'numeric' => 'ข้อมูล :attribute ต้องเป็นตัวเลข',
        );

        $id = $request->id;

        $temp = array(
            'name' => $request->name, 
        );

        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect()->action('TypeController@edit', ['id' => $id])
            ->withErrors($validator)
            ->withInput();
        }

        $types = type::find($id);
        $types->name = $request->name;
        $types->save();

        return redirect('type')
        ->with('ok' , 'true')
        ->with('msg' ,'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function insert(Request $request) {
    
        $rules = array(
            'name' => 'required',
        );

        $messages = array(
            'required' => 'ข้อมูล :attribute จำเป็นต้องกรอก',
            'numeric' => 'ข้อมูล :attribute ต้องเป็นตัวเลข',
        );

        $id = $request->id;

        $temp = array(
            'name' => $request->name, 
        );

        $validator = Validator::make($temp, $rules, $messages);
        if($validator->fails()) {
            return redirect('type/edit/' . $id)
            ->withErrors($validator)
            ->withInput();
        }

        $types = new type();
        $types->name = $request->name;
        $types->save();

        return redirect('type')
        ->with('ok' , 'true')
        ->with('msg' ,'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function remove($id) {
        type::find($id)->delete();
        return redirect('type')
        ->with('ok', 'True')
        ->with('msg', 'ลบข้อมูลเรียบร้อยแล้ว');
  }


}
