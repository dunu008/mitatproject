@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-list"></i>View applicants
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">

				<div>
        			<input id="searchDoc" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="searchText">
				</div>
				<br>
				

				<!-- table to view candidates details -->
				<div class="table-responsive">

					<div>
						
						<table id="viewApplicantsTable" class="table table-bordered table-hover table-striped">
						
							<thead>
								<tr>
									<th>Uni ID</th>
									<th>Full Name</th>
									<th>National ID</th>
									<th>District</th>
									<th>A/L Index No</th>
									<th>Z-Score</th>
									<th>Section A</th>
									<th>Section B</th>
									<th>Section C</th>
									<th>Qualified</th>
								</tr>
							</thead>

							<tbody>
								@foreach($applicants as $applicant)
									<tr>
										<td>{{$applicant->id}}</td>
										<td>{{$applicant->fullname}}</td>
										<td>{{$applicant->nic}}</td>
										<td>{{$applicant->district}}</td>
										<td>{{$applicant->al_index}}</td>
										<td>{{$applicant->al_zscore}}</td>
										<td>{{$applicant->sectionA}}</td>
										<td>{{$applicant->sectionB}}</td>
										<td>{{$applicant->sectionC}}</td>
										<td>{{$applicant->qualified}}</td>
									</tr>
								@endforeach
							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<script>

	$(document).ready(function(){		

		//search
		$("#searchDoc").on("keyup",function(){
			$value=$("#searchDoc").val();
			if($value==""){
				//to do
			}else{
				console.log($value);
				$.ajax({
					type : 'get',
					url : '{{URL::to('/viewApplicants/search')}}',
					data:{'searchText':$value },
					success:function(data){
						$('tbody').html(data);
					}
				});
			}
		});

	});

</script>

<script>
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

@endsection