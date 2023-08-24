@extends('layouts.master')
@section('title', 'Petshop | พี่น้องสัตว์เลี้ยง')
@section('content')
    {!! Form::open(array (
        'action' => 'App\Http\Controllers\TypeController@insert',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
     )) !!}


<h1>เพิ่มประเภท</h1>
<ul class="breadcrumb">
    <li><a href="{{ URL::to('type') }}">หน้าแรก</a></li>
    <li class="active">เพิ่มประเภท </li>
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
                <td>{{ Form::label('name', 'ชื่อประเภท') }} </td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
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
