@extends('layouts.master')
<!-- de hien vao phan noi dung ben file master thi  day phai extends file master va tao section noidung -->


@section('NoiDung')

<h2>Laravel</h2>
{{-- dieu kien if else --}}
@if($khoahoc != '')
{{ $khoahoc }}
{!! $khoahoc !!}
@else
{{ "Khong co khoa hoc" }}
@endif
{{-- day la comment --}}
@endsection
