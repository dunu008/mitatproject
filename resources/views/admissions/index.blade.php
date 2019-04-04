@extends('layouts.app')

@section('content')


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

				
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover table-striped">
						
						<thead>
							<tr>
								<th>Uni index</th>
								<th>Full name</th>
								<th>Address</th>
								<th>A/L index</th>
								<th>NIC</th>
								<th>Venue</th>
								<th>Options</th>
							</tr>
						</thead>

						<tbody>
                            @if(count($applicants)>0)
                                @foreach($applicants as $applicant)
                                    <tr>
                                        <td>{{$applicant->id}}</td>
                                        <td>{{$applicant->fullname}}</td>
                                        <td>{{$applicant->address}}</td>
                                        <td>{{$applicant->al_index}}</td>
                                        <td>{{$applicant->nic}}</td>
                                        <td>{{$applicant->venue['name']}}</td>
										<td><a href="{{action('AdmissionController@downloadPDF', $applicant->id)}}">PDF</a></td>
                                    </tr>
                                @endforeach
                                    {{$applicants->links()}}
                            @else
                                <h3>No applicants</h3>
                            @endif
							
						</tbody>

					</table>

				</div>

			</div>

		</div>

	</div>


</div>

<script>


</script>

@endsection