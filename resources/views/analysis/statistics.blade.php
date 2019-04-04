@extends('layouts.app')

@section('content')

<div class="row">
	
	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">

				<h2 class="panel-title">
					<i class="fas fa-chart-line"></i>Aptitude Test Result Distribution
				</h2>

			</div>

			<div class="panel-body">

			<div class="container"> 
				<div class="row"> 
					<!-- section A -->
					<div class="col-md-6">
						<canvas id="canvas1"></canvas>	
					</div>

					<!-- section B -->
					<div class="col-md-6">
						<canvas id="canvas2"></canvas>	
					</div>
				</div> 

				<div class="row"> 
					<!-- section C -->
					<div class="col-md-6">
						<canvas id="canvas3"></canvas>	
					</div>

					<!-- total -->
					<div class="col-md-6">
						<canvas id="canvas4"></canvas>	
					</div>
				</div> 

			</div>
				

            </div>

	    </div>

    </div>		

</div>


<script>
    // section A
    var url1 = "{{url('/analyze/statistics/sectionA')}}";
    var SectionA = new Array();
    var CountA = new Array();

    // section B
    var url2 = "{{url('/analyze/statistics/sectionB')}}";
    var SectionB = new Array();
    var CountB = new Array();

    // section C
    var url3 = "{{url('/analyze/statistics/sectionC')}}";
    var SectionC = new Array();
    var CountC = new Array();

    // section TOTAL
    var url4 = "{{url('/analyze/statistics/total')}}";
    var SectionT = new Array();
    var CountT = new Array();

    $(document).ready(function(){

        // SECTION A
        $.get(url1, function(response){
        response.forEach(function(data){
            SectionA.push(data.sectionA);
            CountA.push(data.totalA);
        });
        var ctx1 = document.getElementById("canvas1").getContext('2d');
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels:SectionA,
                    datasets: [{
                        label: 'Section A',
                        data: CountA,
                        borderWidth: 1,
                        backgroundColor: "#ff6361"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });

        // SECTION B
        $.get(url2, function(response){
        response.forEach(function(data){
            SectionB.push(data.sectionB);
            CountB.push(data.totalB);
        });
        var ctx2 = document.getElementById("canvas2").getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels:SectionB,
                    datasets: [{
                        label: 'Section B',
                        data: CountB,
                        borderWidth: 1,
                        backgroundColor: "#bc5090"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });


        // SECTION C
        $.get(url3, function(response){
        response.forEach(function(data){
            SectionC.push(data.sectionC);
            CountC.push(data.totalC);
        });
        var ctx3 = document.getElementById("canvas3").getContext('2d');
            var myChart3 = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels:SectionC,
                    datasets: [{
                        label: 'Section C',
                        data: CountC,
                        borderWidth: 1,
                        backgroundColor: "#ffa600"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });

        // SECTION TOTAL
        $.get(url4, function(response){
            console.log("aaa");
        response.forEach(function(data){
            SectionT.push(data.sectionT);
            CountT.push(data.totalT);
        });
        var ctx4 = document.getElementById("canvas4").getContext('2d');
            var myChart4 = new Chart(ctx4, {
                type: 'bar',
                data: {
                    labels:SectionT,
                    datasets: [{
                        label: 'TOTAL',
                        data: CountT,
                        borderWidth: 1,
                        backgroundColor: "#003f5c"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });

        

    });
  
</script>

@endsection
