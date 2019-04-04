@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-location-arrow"></i>Edit test centers
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

        <form id="venueEditForm" method="post" action="{{ route('venues.update', $venue->id) }}">
          @method('PATCH')
          @csrf

          <div class="form-group">
              <label>Venue Name:</label>
              <input type="text" class="form-control" name="name" value={{ $venue->name }} />
          </div>

          <div class="form-group">
              <label>Capacity :</label>
              <input type="text" class="form-control" name="capacity" value={{ $venue->capacity}} />
          </div>

          <div class="form-group">
              <label>Location:</label>
              <input type="text" class="form-control" name="location" value={{ $venue->location}} />
          </div>

          <button type="submit" class="btn btn-primary">Update</button>

        </form>
				
				

			</div>

		</div>

	</div>


</div>

<script>

	

	$(document).ready(function(){

		jQuery.validator.addMethod("checkcapacity", function(value, element) {
  			return this.optional(element) ||  /^\d*$/.test(value);
		}, "Please enter a positive number"); 


		$("#venueEditForm").validate({

            onkeyup: function(element) {
				this.element(element);
				console.log('onkeyup fired');
			},
			
			onfocusout: function(element) {
				this.element(element);
				console.log('onfocusout fired');
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