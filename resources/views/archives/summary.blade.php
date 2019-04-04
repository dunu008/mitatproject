@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-archive"></i>View summary
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">				

				<!-- table to view candidates details -->
				<div class="table-responsive">
						
						<table class="table table-bordered table-hover table-striped">
						
							<thead>
								<tr>
									<th>Year</th>
									<th>Total applicants</th>
									<th>Faced test</th>
									<th>No. qualified</th>
									<th>Section A</th>
									<th>Section B</th>
									<th>Section C</th>
									<th>Total</th>
									
								</tr>
							</thead>

							<tbody>
								
								@foreach($qualified as $data)
									<tr>
										<td>{{$data->appliedYear}}</td>
										<td></td>
										<td></td>
										<td>{{$data->qualify}}</td>
										<td>{{$data->minA}}</td>
										<td>{{$data->minB}}</td>
										<td>{{$data->minC}}</td>
										<td>{{$data->minTotal}}</td>
									</tr>
								@endforeach

							</tbody>

						</table>

						<div class="hidden">
							@foreach($summaryInfo as $info)
								<p class="total">{{$info->total}}</p>
								<p class="facedTest">{{$info->sectionA}}</p>
							@endforeach
						</div>

				</div>

			</div>

		</div>

	</div>

</div>

@endsection