@extends('layouts.app')

@section('content')

<style>
table td input {
	border: 0;
	margin: 0 auto;
    width: 100%;
	height: 100%;
	background-color: #F9F9F9;
}


</style>


<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-table"></i>Admissions 
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">

            @if ($errors->any())
      		<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
              			<li>{{ $error }}</li>
            		@endforeach
        		</ul>
      		</div><br />
			@endif
				

				<!-- table to show venue data -->
				<div>
					<table id="venueTable" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Venue ID</th>
								<th>Name</th>
								<th>Total capacity</th>
								<th>Used capacity</th>
								<th>Remaining capacity</th>
								<th>Set capacity</th>
								<th>Option</th>
							</tr>
						</thead>

						<tbody>
							@if(count($venues)>0)
								@foreach($venues as $venue)
									@if(!empty($assignedCapacity[$venue->id]))
									<tr>
										<td>{{$venue->id}}</td>
										<td>{{$venue->name}}</td>
										<td>{{$venue->capacity}}</td>
										<td>{{$assignedCapacity[$venue->id]}}</td>
										<td></td>
										<td><input type="text" class="setCapacity"></td>
										<td><input type="button" class="btn btn-primary setbtn" value="set"></td>
									</tr>
									@else
									<tr>
										<td>{{$venue->id}}</td>
										<td>{{$venue->name}}</td>
										<td>{{$venue->capacity}}</td>
										<td>0</td>
										<td></td>
										<td><input type="text" class="setCapacity"></td>
										<td><input type="button" class="btn btn-primary setbtn" value="set"></td>
									</tr>
									@endif
								@endforeach
							@else
								<h3>No venues</h3>
							@endif
						</tbody>
					</table>
				</div>

				<br>

				<div>
					<label>Required capacity to be filled : </label>
					<label id="emptyCountLbl"></label>
					<input id="clearVenues" class="btn btn-primary" type="button" value="Clear all venues">
				</div>
				<br>
				
				<!-- table to show admission details -->
				<form id="admissionForm" class="form-horizontal" role="form" method="post" action="/admissions/edit">
				@method('PATCH')
				@csrf 

				<div class="table-responsive">
					
					<table id="applicantTable" class="table table-bordered table-hover table-striped">
						
						<thead>
							<tr>
								<th>Uni index</th>
								<th>Full name</th>
								<th>Address</th>
								<th>A/L index</th>
								<th>NIC</th>
								<th>Venue ID</th>
							</tr>
						</thead>

						<tbody>
                            @if(count($applicants)>0)
								@foreach($applicants as $i => $applicant)
                                    <tr>
                                        <td><input type="text" name="applicants[{{ $i }}][id]" value={{$applicant->id}} readonly ></td>
                                        <td>{{$applicant->fullname}}</td>
                                        <td>{{$applicant->address}}</td>
                                        <td>{{$applicant->al_index}}</td>
                                        <td>{{$applicant->nic}}</td>
										<td><input type="text" name="applicants[{{ $i }}][applicantvenue_fk]" class="venueidClass" readonly value={{$applicant->venue['id']}} ></td>
                                    </tr>
                                @endforeach
                            @else
                                <h3>No applicants</h3>
                            @endif
							
						</tbody>

					</table>

					<input type="submit" id="submitbtn" class="btn btn-primary" value="Submit" style="visibility:hidden;">

				</div>

				</form>

			</div>

		</div>

	</div>


</div>

<script>

	$(document).ready(function(){

		//fill remaining capacity colomn in venue table 
		$("#venueTable tbody tr").each(function(){
			var col3 = $(this).find("td:eq(2)").html();
			var col4 = $(this).find("td:eq(3)").html();
			$(this).find("td:eq(4)").html(col3-col4);
		});

		var countEmpty = 0;
		//get the number of applicants who do not have venues
		$("#applicantTable tbody tr").each(function(){
			if($(this).find("td:eq(5) input[type='text']").val()==""){
				countEmpty++;
			}
		});	
		$("#emptyCountLbl").html(countEmpty);


		//get number on set button click
		$("#venueTable tbody tr").on("click",".setbtn",function(){

			var setNum = $(this).closest("tr").find("td .setCapacity").val();
			var id =  $(this).closest("tr").find("td").eq(0).html();
			$(this).closest("tr").find("td .setCapacity").val("");

			var countFilled = 0;

			$("#applicantTable tbody tr").each(function(){
				if($(this).find("td:eq(5) input[type='text']").val()=="" && countFilled<setNum){
					$(this).find("td:eq(5) input[type='text']").val(id);
					countFilled++;
				}
			});

			$("#submitbtn").click();
			
		});

		//disable set button if "set capacity" is larger than "remaining capacity"
		$("#venueTable tbody tr").on("keyup","td:eq(5) input[type='text']",function(){

			var col5 = $(this).closest("tr").find("td:eq(4)").html();
			console.log(col5);
			var col6 = $(this).closest("tr").find("td:eq(5) input[type='text']").val();
			console.log(col6);

			if( col5 < parseInt(col6) ){
				$(this).closest("tr").find("input[type='button']").prop("disabled",true);
			}else{
				$(this).closest("tr").find("input[type='button']").prop("disabled",false);
			}

		});

		//clear all assigned venues on button click " clear venues"
		$(document).on("click","#clearVenues",function(){
			$("#applicantTable tbody tr").each(function(){
				$(this).find("td:eq(5) input[type='text']").val("");
			});
			$("#submitbtn").click();
		});

	});

</script>

@endsection