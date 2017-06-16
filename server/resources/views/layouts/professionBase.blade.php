@extends('layouts.base')

@section('title')
	{{ $displayedProfession->name }}
@endsection

@section('content')
	<ol class="breadcrumb">
		<li class="active">Российские стандарты: {{ $displayedProfession->name }}</li>
		<li><a href="{{ route('professions', ['id' => $displayedProfession->id]) }}/blocks">Объединенное множество знаний: блоки</a></li>
		<li><a href="{{ route('professions', ['id' => $displayedProfession->id]) }}/levels">Объединенное множество знаний: уровни</a></li>
	</ol>

	<h3 class="page-header">{{ $displayedProfession->name }}</h3>
	
	@yield('additionalContent')
@endsection
