@extends('layouts.professionBase')

@section('additionalContent')
	@foreach($displayedProfession->blocks() as $block)
		<div class="row">
			<h4>{{ $loop->iteration }}. Блок "{{ $block->name }}"</h4>

			<div class="col-xs-6">
				<ul class="col-xs-6">
					@foreach($block->topics() as $topic)
						<li>{{ $topic->name }}</li>
					@endforeach
				</ul>
			</div>
			
		</div>
	@endforeach
@endsection
