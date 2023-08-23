@extends('layouts.master')
@section('title', 'Petshop | พี่น้องสัตว์เลี้ยง')
@section('content')
    <div class="container">
        <h1>รายการ</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><strong>รายการ</strong></div>
            </div>
            <div class="panel-body">
                <a href="{{ URL::to('pet/edit') }}" class="btn btn-success pull-right">เพิ่มข้อมูล</a>
                <form action="{{ URL::to('pet/search') }}" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
                <br>
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>รูป</th>
                            <th>รหัส</th>
                            <th>สายพันธุ์ </th>
                            <th>ประเภท</th>
                            <th>การทำงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pets as $p)
                            <tr>
                                <td><img src="{{ $p->image_url }}" alt="" width="100"></td>

                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->type->name }}</td>
                                <td class="bs-center">
                                    <a href="{{ URL::to('pet/edit/' . $p->id) }}" class="btn btn-info">
                                        <i class="fa fa-edit"></i> แก้ไข</a>
                                    <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}">
                                        <i class="fa fa-trash"></i> ลบ</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
            <div class="panel-footer ">
                <span>แสดงข้อมูลจํานวน {{ count($pets) }} รายการ</span>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                var id = $(this).attr('id-delete');
                if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่')) {
                    window.location.href = '/pet/remove/' + id;
                }
            });
        });
    </script>
@endsection
