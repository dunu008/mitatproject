@extends('layouts.app')

@section('content')

<div class="row">
	
	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">

				<h2 class="panel-title">
					<i class="fas fa-chart-line"></i>Analyze results
				</h2>

			</div>

			<div class="panel-body">

                <form  method="post" action="/analyze">
				@csrf

					<!-- section A -->
					<div class="form-group threshold-marks">
						<label class="col-md-4 control-label">Section A</label>
						<div class="col-md-6">
							<input id="secA" type="text" name="sectionA" class="form-control" value="0" >
						</div>
					</div>

					<!-- section B -->
					<div class="form-group threshold-marks">
						<label class="col-md-4 control-label">Section B</label>
						<div class="col-md-6">
							<input id="secB"  type="text" name="sectionB" class="form-control" value="0" >
						</div>
					</div>
					
					<!-- section C -->
					<div class="form-group threshold-marks">
						<label class="col-md-4 control-label">Section C</label>
						<div class="col-md-6">
							<input id="secC"  type="text" name="sectionC" class="form-control" value="0" >
						</div>
					</div>

					<!-- total -->
					<div class="form-group threshold-marks">
						<label class="col-md-4 control-label">Total</label>
						<div class="col-md-6">
							<input id="total" type="text" name="total" class="form-control" value="0" >
						</div>
                    </div>

                    <!-- submit -->
					<div class="form-group">
							<button class="btn btn-primary" type="button" id="filterButton">Filter</button>
							<button class="btn btn-primary" type="submit" id="set">Set</button>
                    </div>

                </form>

            </div>

			
            

            <!-- table to view analysis -->
				<div class="col-lg-12">

				<!-- show total qualified amount -->
				<br>
				<div>
					<label>Qualified : </label>
					<label id="qualifiedAmount"></label>
				</div>
				
                        <div class="table-responsive">
        
                            <div id="table-analyze">
                                    
                                <table class="table table-bordered table-hover table-striped" id="viewAnalysisTable">
                                    
                                    <thead>
                                        <tr>
											<th>No.</th>
                                            <th>District</th>
                                            <th>Amount</th>
                                            <th>Max AL zscore</th>
                                            <th>Min AL zscore</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>

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

	$("#filterButton").on("click",function(){
		$valueA=$("#secA").val();
		$valueB=$("#secB").val();
		$valueC=$("#secC").val();
		$valueTot=$("#total").val();
		$.ajax({
			type : 'get',
			url : '{{URL::to('analyze/filter')}}',
			data:{	'sectionA':$valueA,
					'sectionB':$valueB,
					'sectionC':$valueC,
					'total':$valueTot	
				},
			success:function(data){
				$('tbody').html(data);
			}
		});
	});

});
</script>

<script>
$(window).on('load', function() {
	$(function(){
      $('#filterButton').click();
    });

	
});
</script>

<script>
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

@endsection
