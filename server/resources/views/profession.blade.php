@extends('layouts.professionBase')

@section('additionalContent')
	<h4 class="knowledges-header">Необходимые знания из Российского стандарта: &nbsp;
		<a href="{{ URL::to('pdf/'.$displayedProfession->ruSourceStandard()->file) }}">(скачать pdf)</a></h4>
            <ul>
				@foreach($displayedProfession->ruSourceStandard()->knowledges($displayedProfession->id) as $knowledge)
					<li>{{ $knowledge->name }}</li>
				@endforeach
            </ul>


            <h4 class="knowledges-header">Knowledge examples from European e-Competence Framework: &nbsp;
				<a href="{{ URL::to('pdf/'.$displayedProfession->euSourceStandard()->file) }}">(скачать pdf)</a></h4>
                <ul>
                    @foreach($displayedProfession->euSourceStandard()->knowledges($displayedProfession->id) as $knowledge)
						<li>{{ $knowledge->name }}</li>
					@endforeach
                </ul>

            <h4 class="knowledges-header"><a href="{{ route('professions', ['id' => $displayedProfession->id]) }}/blocks">Объединенное множество знаний:</a></h4>
            @foreach($displayedProfession->blocks() as $block)
				<p> {{ $loop->iteration }} группа "{{ $block->name }}"</p>
			@endforeach
@endsection
