@extends('layouts.app')

@section('content')

	<!-- row 1 -->
<div class="row">
	
	<div class="col-lg-12">
		
		<h1 class="page-header">Dashboard</h1>

		<ol class="breadcrumb">
			
			<li class="active">
				<i class="fas fa-tachometer-alt"></i>Dashboard - 2019
			</li>

		</ol>

	</div>

</div>

<!-- row 2 -->
<div class="row">

	<!-- registrations -->
	
	<div class="col-lg-3 col-md-6">
		
		<div class="panel panel-primary">
			
			<div class="panel-heading">
				
				<div class="row">
					
					<div class="col-xs-3">
						
						<i class="fa fa-tasks fa-5x"></i>

					</div> 

					<div class="col-xs-9 text-right">	
						<div class="huge">{{$applicantsCount}}</div>
						<div>Registrations</div>
					</div>

				</div>

			</div>

			<a href="/applicants">
				
				<div class="panel-footer">
					
					<span class="pull-left">View details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>

				</div>

			</a>

		</div>

	</div>

	<!-- test centers -->
	
	<div class="col-lg-3 col-md-6">
		
		<div class="panel panel-green">
			
			<div class="panel-heading">
				
				<div class="row">
					
					<div class="col-xs-3">
						
						<i class="fa fa-location-arrow fa-5x"></i>

					</div> 

					<div class="col-xs-9 text-right">	
						<div class="huge">{{$testCenterCapacity}}</div>
						<div>Test centers capacity</div>
					</div>

				</div>

			</div>

			<a href="/venues">
				
				<div class="panel-footer">
					
					<span class="pull-left">View details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>

				</div>

			</a>

		</div>

	</div>

	<!-- Applicants faced the exam -->
	
	<div class="col-lg-3 col-md-6">
		
		<div class="panel panel-yellow">
			
			<div class="panel-heading">
				
				<div class="row">
					
					<div class="col-xs-3">
						
						<i class="fa fa-edit fa-5x"></i>

					</div> 

					<div class="col-xs-9 text-right">	
						<div class="huge">{{$facedTestCount}}</div>
						<div>Faced the test</div>
					</div>

				</div>

			</div>

			<a href="/viewApplicants">
				
				<div class="panel-footer">
					
					<span class="pull-left">View details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>

				</div>

			</a>

		</div>

	</div>

	<!-- Qualified -->
	
	<div class="col-lg-3 col-md-6">
		
		<div class="panel panel-red">
			
			<div class="panel-heading">
				
				<div class="row">
					
					<div class="col-xs-3">
						
						<i class="fa fa-archive fa-5x"></i>

					</div> 

					<div class="col-xs-9 text-right">	
						<div class="huge">{{$qualifiedCount}}</div>
						<div>Qualified applicants</div>
					</div>

				</div>

			</div>

			<a href="/viewApplicants">
				
				<div class="panel-footer">
					
					<span class="pull-left">View details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>

				</div>

			</a>

		</div>

	</div>

</div>

@endsection
        

