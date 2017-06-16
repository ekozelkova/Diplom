@extends('layouts.professionBase')

@section('additionalContent')
<h4 class="page-header">Уровни знаний</h4>

	<h4 class="lower-levels-header">Начальные уровни знаний 1-3</h4>
	
	<?php $tablesCounter = 1; ?>
	
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		@foreach($displayedProfession->lowLevelTopics() as $topic)
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading{{ $tablesCounter }}">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $tablesCounter }}" aria-expanded="true" aria-controls="collapse{{ $tablesCounter }}">
							{{ $topic->name }}
						</a>
					</h4>
				</div>
				<div id="collapse{{ $tablesCounter }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{ $tablesCounter }}">
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
							<tr>
								<th>1 уровень</th>
								<th>2 уровень</th>
								<th>3 уровень</th>
							</tr>
							</thead>

							<tbody>
							@foreach($topic->knowledges($displayedProfession->id) as $row)
								<tr>
									<td>{{ $row[0] or ''}}</td>
									<td>{{ $row[1] or ''}}</td>
									<td>{{ $row[2] or ''}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php $tablesCounter++; ?>
		@endforeach
	</div>
	
	<h4 class="lower-levels-header">Высшие уровни знаний 4-5</h4>
	
	<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
		@foreach($displayedProfession->highLevelTopics() as $topic)
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading{{ $tablesCounter }}">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $tablesCounter }}" aria-expanded="true" aria-controls="collapse{{ $tablesCounter }}">
							{{ $topic->name }}
						</a>
					</h4>
				</div>
				<div id="collapse{{ $tablesCounter }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{ $tablesCounter }}">
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
							<tr>
								<th></th>
								<th>4 уровень</th>
								<th>5 уровень</th>
							</tr>
							</thead>

							<tbody>
								@foreach($topic->subtopics($displayedProfession->id) as $subtopic)
									<tr>
										<th>{{ $subtopic->name }}</th>

										<td>
											@foreach($subtopic->knowledges($displayedProfession->id, $topic->id, 4) as $knowledge)
												{{ $knowledge->name }};&nbsp
											@endforeach
										</td>
										<td>
											@foreach($subtopic->knowledges($displayedProfession->id, $topic->id, 5) as $knowledge)
												{{ $knowledge->name }};&nbsp
											@endforeach
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>
		<?php $tablesCounter++; ?>
		@endforeach
	</div>
             
@endsection
