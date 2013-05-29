@section('tabs')
<ul>
	@foreach( $tabs as $text => $url )
		@if( $current == $text )
			<li><a href="{{ $url }}" class="current"><span>{{ $text }}</span></a></li>
		@else
			<li><a href="{{ $url }}"><span>{{ $text }}</span></a></li>
		@endif
	@endforeach
</ul>
@endsection