@extends('layouts.master') @section('title') Animal @stop
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error}}</div>
    @endforeach
</div>
@endif

<div class="container">
    <h1>แก้ไขสัตว์</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('animal')}}">หน้าแรก</a></li>
        <li class="active">แก้ไขสัตว์</li>
    </ul>
    {!! Form::model($animal,array('action' => 'App\Http\Controllers\AnimalController@update','method'=> 'post','enctype' => 'multipart/form-data'))!!}
    <input type="hidden" name="id" value={{ $animal->id}}>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>รายการข้อมูลแก้ไขสัตว์</strong>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::model($animal, array('method' => 'post', 'enctype' => 'multipart/form-data')) !!}
            <input type="hidden" name="id" value="{{ $animal->id}}">
            <table>
                <tr>
                    <td>{{ Form::label('name','ชื่อ')}}</td>
                    <td>{{ Form::text('name',$animal->name,['class' => 'form-control'])}}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('type_id','ประเภทชนิด')}}</td>
                    <td>{{ Form::select('type_id',$types,Request::old('type_id'),['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('status_id','ประเภทสถานะ')}}</td>
                    <td>{{ Form::select('status_id',$status,Request::old('status_id'),['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('image','รูปภาพ')}}</td>
                    <td>{{ Form::file('image')}}</td>
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

{!! Form::close() !!}
@endsection