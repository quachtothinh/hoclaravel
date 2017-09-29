<form action="{{ route('MyPostForm') }}" method="post">

	{{ csrf_field() }}
	<input type="text" name="HoTen">
	<input type="text" name="Tuoi">
	<input type="submit">	
</form>	