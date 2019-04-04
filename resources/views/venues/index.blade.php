@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-location-arrow"></i>View test centers => Total capacity available : <label id="totalCapacity"></label>
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
				
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover table-striped">
						
						<thead>
							<tr>
                                <!-- <th>ID</th> -->
								<th>Name</th>
								<th>Capacity</th>
								<th>Venue</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>

						<tbody>
							@if(count($venues)>0)
								@foreach($venues as $venue)
								<tr>
									<!-- <td>{{$venue->id}}</td> -->
									<td>{{$venue->name}}</td>
									<td class="capacity">{{$venue->capacity}}</td>
									<td>{{$venue->location}}</td>
									<td><a href="{{ route('venues.edit',$venue->id)}}" class="btn btn-primary">Edit</a></td>
									<td>
										<form action="{{ route('venues.destroy', $venue->id)}}" method="post">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger" type="submit">Delete</button>
										</form>
									</td>
								</tr>
								@endforeach
								{{$venues->links()}}
							@else
								<h3>No venues</h3>
							@endif
								
							
						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>


</div>


<script>

$(document).ready(function(){
		var sum = 0;
		$(".capacity").each(function(){
			var value = $(this).text();
			if(!isNaN(value) && value.length != 0){
				sum += parseFloat(value);
			}
			$('#totalCapacity').html(sum);
		});
	
});

</script>

@endsection
