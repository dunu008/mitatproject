@extends('layouts.app')

@section('content')
    <div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fas fa-user-edit"></i>View registered applicants
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">
				
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover table-striped">
						
						<thead>
							<tr>
								<th>Uni ID</th>
								<th>Full Name</th>
								<th>Surname</th>
								<th>National ID</th>
								<th>Address</th>
								<th>District</th>
								<th>Telephone</th>
								<th>A/L Index No</th>
								<th>Z-Score</th>
								<th>A/L-sub1</th>
								<th>sub1 result</th>
								<th>A/L-sub2</th>
								<th>sub2 result</th>
								<th>A/L-sub3</th>
								<th>sub3 result</th>
								<th>A/L English</th>
								<th>O/L Year</th>
								<th>O/L maths</th>
								<th>O/L english</th>
								<th>Priority</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>

						<tbody>
							@if(count($applicants)>0)
								@foreach($applicants as $applicant)
								<tr>
									<td>{{$applicant->id}}</td>
									<td>{{$applicant->fullname}}</td>
									<td>{{$applicant->surname}}</td>
									<td>{{$applicant->nic}}</td>
									<td>{{$applicant->address}}</td>
									<td>{{$applicant->district}}</td>
									<td>{{$applicant->telephone}}</td>
									<td>{{$applicant->al_index}}</td>
									<td>{{$applicant->al_zscore}}</td>
									<td>{{$applicant->al_sub1}}</td>
									<td>{{$applicant->al_sub1_result}}</td>
									<td>{{$applicant->al_sub2}}</td>
									<td>{{$applicant->al_sub2_result}}</td>
									<td>{{$applicant->al_sub3}}</td>
									<td>{{$applicant->al_sub3_result}}</td>
									<td>{{$applicant->al_english}}</td>
									<td>{{$applicant->ol_year}}</td>
									<td>{{$applicant->ol_maths}}</td>
									<td>{{$applicant->ol_english}}</td>
									<td>{{$applicant->priority}}</td>
									<td><a href="{{ url('/registration/edit',['id'=> $applicant->id])}}" class="btn btn-primary">Edit</a></td>
									<td>
										<form action="{{ url('/registration',['id'=> $applicant->id])}}" method="post">
											<input class="btn btn-danger" type="submit" value="Delete" />
											<input type="hidden" name="_method" value="delete" />
											{!! csrf_field() !!}
										</form>
									</td>
								</tr>
								@endforeach
								{{$applicants->links()}}
							@endif
						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>


</div>
@endsection
        

