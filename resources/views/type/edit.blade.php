@extends('layouts.master')
@section('title', 'Petshop | พี่น้องสัตว์เลี้ยง')
@section('content')
    <h1>แก้ไขประเภท</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('type') }}">ประเภทสัตว์เลี้ยง</a></li>
        <li class="active">แก้ไขประเภท</li>
    </ul>

    {!! Form::model($types, [
        'action' => 'App\Http\Controllers\TypeController@update',
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) !!}


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif

    <input type="hidden" name="id" value="{{ $types->id }}">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>ข้อมูลประเภทสัตว์</strong>
            </div>
        </div>

    <div class="panel-body">
        <table>

        
            <tr>
                <td>{{ Form::label('name', 'ชื่อสัตว์เลี้ยง') }} </td>
                <td>{{ Form::text('name', $types->name, ['class' => 'form-control']) }}</td>
            </tr>

           

        </table>
    </div>
    <div class="panel-footer">
        <button type="reset" class="btn btn-danger">ยกเลิก</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>

</div>
</div>



    {!! Form::close() !!}
@endsection
