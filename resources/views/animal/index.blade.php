@extends("layouts.master")
@section('title') Animal | รายการสินค้า @stop
@section('content')
<!DOCTYPE html>
<head>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container">
        <h1>รายการ Animal</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><strong>รายการ</strong></div>
            </div>
            <div class="panel-body">
                <form action="{{ URL::to('product/search')}}" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <input type="text" name="q" class="form-control" placeholder="พิมพ์รหัสหรือชื่อเพื่อค้นหา">
                    <a href="{{ URL::to('product/edit')}}" class="btn btn-success pull-right">เพิ่มสินค้า</a>
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </form>
            </div>
            <table class="table table-bordered bs_table">
                <thead>
                    <tr>
                        <th>รูปสัตว์</th>
                        <th>ชื่อสัตว์</th>
                        <th>ประเภท</th>
                        <th>สถานะ</th>
                        <th>การทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($animals as $p)
                        <tr>
                            <td><img src="{{ $p->image_url}}" alt="" width="100px"></td>
                            <td>{{ $p->name}}</td>
                            <td>{{ $p->type->name}}</td>
                            <td>{{ $p->status->name}}</td>
                            <td class="bs-center">
                                <a href="{{ URL::to('animal/edit/'.$p->id) }}" class="btn btn-info"><i class="fa fa-edit"></i>แก้ไข</a>
                                <a href="#" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i>ลบ</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="panel-footer">
                <span>แสดงข้อมูลจำนวน {{ count($animals)}}</span>
            </div>
        </div>
    </div>
<div class="container">
    {{ $animals->links()}}
</div>
    
</body>
</html>

<script>
    $('.btn-delete').on('click',function() {if(confirm("คุณต้องการลบข้อมูลสินค้าใช่หรือไม่")) {
        var url = "{{ URL::to('product/remove')}}" + '/' + $(this).attr('id-delete');
        window.location.href = url;
    }})
</script>
@endsection