@extends('layouts.master')
@section('title', 'Petshop | พี่น้องสัตว์เลี้ยง')
@section('content')
    {!! Form::open(array (
        'action' => 'App\Http\Controllers\PetController@insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
     )) !!}


<h1>เพิ่มข้อมูลสัตว์</h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('pet') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มข้อมูลสัตว์ </li>
</ul>

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif


<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <strong>เพิ่มข้อมูล</strong>
        </div>
    </div>

    <div class="panel-body">
        <table>
            <tr>
                <td>{{ Form::label('id', 'รหัส') }} </td>
                <td>{{ Form::text('id', Request::old('id'), ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('name', 'ชื่อสัตว์เลี้ยง') }} </td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
            </tr>

            <tr>
                <td>{{ Form::label('type_id', 'ประเภทสัตว์เลี้ยง') }} </td>
                <td>{{ Form::select('type_id', $types, Request::old('type_id'), ['class' => 'form-control']) }}</td>

            </tr>

            <tr>
                <td>{{ Form::label('image', 'เลือกรูปภาพสินค้า ') }}</td>
                <td>{{ Form::file('image') }}</td>
            </tr>

        </table>
        <br>
        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </div>
    </div>
</div>

    {!! Form::close() !!}
@endsection
