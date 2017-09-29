@extends('layouts.master')

@section('NoiDung')

{{-- dieu kien if else --}}
{{--@if($str != '')
{{ $str }}
@else
{{ "Khong co gi" }}
@endif--}}

{{-- Kiem tra bien khoahoc co ton tai hay khong --}}
{{ $str or "Khong ton tai bien khoa hoc" }}

{!! "<br>" !!}
{{-- Vong lap for foreach --}}
@for($i=0; $i<=10; $i++)
{{ $i." " }}
@endfor



<?php $khoahoc = array('PHP', 'Android', 'HTML', 'Javascript'); 
?>
<?php // $khoahoc = array(); 
?>

{{-- Check mang rong hay khong co 2 cach cach duoi va cach forelese --}}
{{--@if(!empty($khoahoc))
	@foreach($khoahoc as $value)
		{{ $value." " }}
	@endforeach
@else 
{{ "Mang rong" }}
@endif

--}}

{{--  Check mang rong hay khong --}}
@forelse($khoahoc as $value)
{{-- continue la bo qua neu gia tri value bang laravel thi bo qua --}}
	@continue($value == "Laravel")
	{{ $value }}
@empty
	{{ "Mang rong" }}
@endforelse

<?php $i=1; ?>
@while($i<10)
{{-- break khi chay i toi 5 thi dung lai va bo luon gia tri 5 --}}
{{-- @break($i==5) --}}
{{ $i }}
<?php $i++; ?>
@endwhile

@endsection

