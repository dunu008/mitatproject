@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-edit"></i>Add test results
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">

			<form id="resultForm" class="form-horizontal" role="form" method="post" action="{{ action('TestResultsController@saveMultiple')}}">
			@method('PATCH')
			@csrf 
				
				<div class="table-responsive">
						
						<table class="table table-bordered table-hover table-striped" id="testResultsTbl">
							
							<thead>
								<tr>
									<th>Uni index</th>
									<th>A correct</th>
									<th>A incorrect</th>
									<th>B correct</th>
									<th>B incorrect</th>
									<th>C correct</th>
									<th>C incorrect</th>
									<th>A total</th>
									<th>B total</th>
									<th>C total</th>
									<th>Total</th>
								</tr>
							</thead>

							<tbody>
								@foreach($applicants as $i => $applicant)
									<tr class="tableRow">
											<td><input type="text" name="applicants[{{ $i }}][id]" value={{$applicant->id}} readonly></td>
											<td><input type="text" class="correctA" name="correctA" ></td>
											<td><input type="text" class="incorrectA" name="incorrectA"></td>
											<td><input type="text" class="correctB" name="correctB"></td>
											<td><input type="text" class="incorrectB" name="incorrectB"></td>
											<td><input type="text" class="correctC" name="correctC"></td>
											<td><input type="text" class="incorrectC" name="incorrectC"></td>
											<td><input type="text" class="totalA" name="applicants[{{ $i }}][sectionA]" readonly></td>
											<td><input type="text" class="totalB" name="applicants[{{ $i }}][sectionB]" readonly></td>
											<td><input type="text" class="totalC" name="applicants[{{ $i }}][sectionC]" readonly></td>
											<td class="total"></td>
									</tr>
								@endforeach
							</tbody>

						</table>

					<input id="submitbtn" type="submit" id="submitbtn" class="btn btn-primary" value="Submit">

				</div>

				</form>		

			</div>

		</div>

	</div>


</div>

<script>

$(document).ready(function(){

	//SHOW TOTAL VALUES 
	$(document).on('keyup','.tableRow',function(){

		var currentRow = $(this).closest("tr");
		
		var col1 = currentRow.find(".correctA").val();
		var col2 = currentRow.find(".incorrectA").val();
		$(".totalA",this).val(parseFloat(col1)-parseFloat(col2)*0.25);
		var col7 = currentRow.find(".totalA").val();

		var col3 = currentRow.find(".correctB").val();
		var col4 = currentRow.find(".incorrectB").val();
		$(".totalB",this).val(parseFloat(col3)-parseFloat(col4)*0.25);
		var col8 = currentRow.find(".totalB").val();

		var col5 = currentRow.find(".correctC").val();
		var col6 = currentRow.find(".incorrectC").val();
		$(".totalC",this).val(parseFloat(col5)-parseFloat(col6)*0.25);
		var col9 = currentRow.find(".totalC").val();

		$(".total",this).html(parseFloat(col7)+parseFloat(col8)+parseFloat(col9));
	
		if($.isNumeric(col7) && $.isNumeric(col8) && $.isNumeric(col9)){
			$("#submitbtn").attr("disabled", false);
		}else{
			$("#submitbtn").attr("disabled", true);
		}
	});

	//VALIDATIONS
	$(document).on('keyup','.tableRow',function(){
		var currentRow = $(this).closest("tr");
		var col1 = currentRow.find(".correctA").val();
		var col2 = currentRow.find(".incorrectA").val();
		if(col1=="" && col2==""){
			$(".totalA",this).val("");
		}

		var col3 = currentRow.find(".correctB").val();
		var col4 = currentRow.find(".incorrectB").val();
		if(col3=="" && col4==""){
			$(".totalB",this).val("");
		}

		var col5 = currentRow.find(".correctC").val();
		var col6 = currentRow.find(".incorrectC").val();
		if(col5=="" && col6==""){
			$(".totalC",this).val("");
		}
		
	});
	
});


// if(isNaN(col7) && col1=="" && col2==""){
// 			$(".totalA",this).val("");
// 		}else{
// 			$(".totalA",this).val(parseFloat(col1)-parseFloat(col2)*0.25);
// 		}

// 		if(isNaN(col8) && col3=="" && col4==""){
// 			$(".totalB",this).val("");
// 		}else{
// 			$(".totalB",this).val(parseFloat(col3)-parseFloat(col4)*0.25);
// 		}

// 		if(isNaN(col9) && col5=="" && col6==""){
// 			$(".totalC",this).val("");
// 		}else{
// 			$(".totalC",this).val(parseFloat(col5)-parseFloat(col6)*0.25);
// 		}
	
// 		$(".total",this).html(parseFloat(col7)+parseFloat(col8)+parseFloat(col9));		

// 		if($.isNumeric(col7) && $.isNumeric(col8) && $.isNumeric(col9)){	
// 			$("#submitbtn").attr("disabled", false);
// 		}else{
// 			$("#submitbtn").attr("disabled", true);
// 		}


</script>



@endsection