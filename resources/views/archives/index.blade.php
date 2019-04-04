
@extends('layouts.app')

@section('content')

<style>
table {
    display: block;
    max-height: 500px;
    overflow-y: scroll;
}

</style>

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-archive"></i>All archives
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

            <a id="submitCurrentYear" href="{{ url('/archive/currentYear') }}" class="btn btn-primary">Add to archives</a>
            <br><br>
    
            <div class="table-responsive">
        
                <table class="table table-bordered table-hover table-striped">
            
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>ApplicantID</th>
                            <th>Fullname</th>
                            <th>NIC</th>
                            <th>AL zscore</th>
                            <th>District</th>
                            <th>sub1</th>
                            <th>result</th>
                            <th>sub2</th>
                            <th>result</th>
                            <th>sub3</th>
                            <th>result</th>
                            <th>AL English</th>
                            <th>OL Maths</th>
                            <th>OL English</th>
                            <th>Priority</th>
                            <th>sectionA</th>
                            <th>sectionB</th>
                            <th>sectionC</th>
                            <th>Qualified</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($archiveData)>0)
                            @foreach($archiveData as $data)
                            <tr>
                                <td>{{$data->appliedYear}}</td>
                                <td>{{$data->applicantId}}</td>
                                <td>{{$data->fullname}}</td>
                                <td>{{$data->nic}}</td>
                                <td>{{$data->al_zscore}}</td>
                                <td>{{$data->district}}</td>
                                <td>{{$data->al_sub1}}</td>
                                <td>{{$data->al_sub1_result}}</td>
                                <td>{{$data->al_sub2}}</td>
                                <td>{{$data->al_sub2_result}}</td>
                                <td>{{$data->al_sub3}}</td>
                                <td>{{$data->al_sub3_result}}</td>
                                <td>{{$data->al_english}}</td>
                                <td>{{$data->ol_maths}}</td>
                                <td>{{$data->ol_english}}</td>
                                <td>{{$data->priority}}</td>
                                <td>{{$data->sectionA}}</td>
                                <td>{{$data->sectionB}}</td>
                                <td>{{$data->sectionC}}</td>
                                <td>{{$data->qualified}}</td>
                            </tr>
                            @endforeach
                            
                        @else
                            <h3>No data available</h3>
                        @endif 
                        
                    </tbody>

                </table>

            </div>

            </div>

		</div>

	</div>


</div>

<script>
$('#submitCurrentYear').click(function(){
    if(confirm('Do you really want to archive current year')){
        return true;
    }else{
        return false;
    }
});
</script>
@endsection