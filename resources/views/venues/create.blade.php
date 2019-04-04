@extends('layouts.app')

@section('content')

<div class="row">
	
	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">

				<h2 class="panel-title">
					<i class="fa fa-fw fa-location-arrow"></i>Add test centers
				</h2>

			</div>

			<div class="panel-body">
				
				<form id="testcentersform" class="form-horizontal" method="post" action="{{route('venues.store')}}">
					@csrf
					<!-- name -->
					<div class="form-group">
						<label class="col-md-3 control-label">Name</label>
						<div class="col-md-6">
							<input type="text" name="name" class="form-control">
						</div>
					</div>

					<!-- capacity -->
					<div class="form-group">
						<label class="col-md-3 control-label">Maximum capacity</label>
						<div class="col-md-6">
							<input type="text" name="capacity" class="form-control">
						</div>
					</div>
					
					<!-- location -->
					<div class="form-group">
						<label class="col-md-3 control-label">Venue</label>
						<div class="col-md-6">
							<textarea type="text" name="location" rows="3" class="form-control"></textarea>
						</div>
					</div>
			

					<!-- buttons -->
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-3">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" form-control>
						</div>
						<div class="col-md-3">
							<input type="reset" name="reset" value="Reset" class="btn btn-primary" form-control>
						</div>

					</div>


				</form>

			</div>
			


		</div>

	</div>


</div>

<script>

	

	$(document).ready(function(){

		// $(.form-control).click(function(){
		// 	console.log("aaaa");
		// });

		jQuery.validator.addMethod("checkcapacity", function(value, element) {
  			return this.optional(element) ||  /^\d*$/.test(value);
		}, "Please enter a positive number"); 


		$("#testcentersform").validate({

			onkeyup: function(element) {
				this.element(element);
				//console.log('onkeyup fired');
			},
			
			onfocusout: function(element) {
				this.element(element);
				//console.log('onfocusout fired');
			},

			rules: {
				name: "required",
				capacity: {
					required: true,
					checkcapacity: true
				},
				location: "required"
			},
			messages:{
				name:{
					required: "Name is required"
				},
				capacity:{
					required: "Maximum capacity is required"
				},
				location:{
					required: "Location is required"
				}
			}
		});
	});
</script>

@endsection