@section('tabs')
<ul>
	@foreach( $tabs as $tab )
		@if( URL::current() == $tab[1] )
			<li><a href="{{ $tab[1] }}" class="current"><span>{{ $tab[0] }}</span></a></li>
		@else
			<li><a href="{{ $tab[1] }}"><span>{{ $tab[0] }}</span></a></li>
		@endif
	@endforeach
</ul>
@endsection