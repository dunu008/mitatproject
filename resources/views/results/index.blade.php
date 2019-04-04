@extends('layouts.app')

@section('content')


<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-edit"></i>View test results
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">
				
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover table-striped" id="viewResultsTbl">
						
						<thead>
							<tr>
								<th>Uni index</th>
								<th>A total</th>
								<th>B total</th>
								<th>C total</th>
								<th>Total</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>

						<tbody>
							@if(count($applicants)>0)
								@foreach($applicants as $applicant)
								<tr>
									<td>{{$applicant->id}}</td>
									<td>{{$applicant->sectionA}}</td>
									<td>{{$applicant->sectionB}}</td>
									<td>{{$applicant->sectionC}}</td>
									<td class="total"></td>
									<td><a href="{{ url('test-results/edit',['id'=> $applicant->id])}}" class="btn btn-primary">Edit</a></td>
									<td>
										<form action="{{ url('/test-results',['id'=> $applicant->id])}}" method="post">
											<input class="btn btn-danger" type="submit" value="Delete" />
											<input type="hidden" name="_method" value="delete" />
											{!! csrf_field() !!}
										</form>
									</td>
								</tr>
								@endforeach
								{{$applicants->links()}}
							@else
								<h3>No applicants saved</h3>
							@endif

							
						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>


</div>

<script>

//SHOW VALUE IN TOTAL COLOMN BY ADDING
$(document).ready(function(){
	$("#viewResultsTbl tbody tr").each(function(){
		var tr = $(this).closest('tr');
		//console.log(tr);
	 	var totalA = $(this).find("td").eq(1).html();
	 	//console.log(totalA);
		var totalB = $(this).find("td").eq(2).html();
		//console.log("totalB");
		var totalC = $(this).find("td").eq(3).html();	
		var total = parseFloat(totalA)+parseFloat(totalB)+parseFloat(totalC);
		console.log(total);
		$('.total', tr).html(total);
	 });
});

</script>

@endsection