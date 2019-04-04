@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-list"></i>Qualified Applicants Statistics
				</h2>

			</div>
			
		</div>

		<div class="panel-body">
			
			<div class="col-lg-12">

            <div class="container"> 
					<!-- PIE CHART -->
					<div class="col-md-6" style="margin-top:1%;text-align:center;">
                        <h3 style="margin-bottom:8%;">Qualified applicants from each districts</h3>
						<canvas id="canvas1"></canvas>	
					</div>

					<!-- SCATTER PLOT -->
					<div class="col-md-6" style="margin-top:1%;text-align:center;">
                        <h3 style="margin-bottom:8%;">Max/Min Z-score distribution</h3>
						<canvas id="canvas2"></canvas>	
					</div>
			</div>

			</div>

		</div>

	</div>

</div>



<script>

    // pie chart
    var url1 = "{{url('/viewApplicants/statistics/pieChart')}}";
    var District = new Array();
    var Total = new Array();

    // sctter plot
    var url2 = "{{url('/viewApplicants/statistics/scatterPlot')}}";
    var DistrictScatter = new Array();
    var Min = new Array();
    var Max = new Array();

    $(document).ready(function(){

        // pie chart
        $.get(url1, function(response){
        response.forEach(function(data){
            District.push(data.district);
            Total.push(data.total);
        });
        var ctx1 = document.getElementById("canvas1").getContext('2d');
            var myChart1 = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels:District,
                    datasets: [{
                        label: 'Districts',
                        data: Total,
                        borderWidth: 1,
                        backgroundColor: ["#FAEBD7","#DCDCDC","#E9967A","#F5DEB3","#9ACD32","#FAEBD7","#DCDCDC","#E9967A","#F5DEB3","#9ACD32","#FAEBD7","#DCDCDC","#E9967A","#F5DEB3","#9ACD32","#FAEBD7","#DCDCDC","#E9967A","#F5DEB3","#9ACD32","#FAEBD7","#DCDCDC","#E9967A","#F5DEB3","#9ACD32"]
                    }]
                },
                options: {
                    scales: {
                        
                    }
                }
            });
        });


        // sctter plot
        $.get(url2, function(response){
        response.forEach(function(data){
            DistrictScatter.push(data.district);
            Min.push(data.min);
            Max.push(data.max);
        });
        
        var ctx2 = document.getElementById("canvas2").getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels:DistrictScatter,
                    datasets: [{
                        label: "Min z-score",
                        data: Min,
                        backgroundColor: "blue",
                        borderColor: "lightblue",
                        fill: false,
                        lineTension: 0,
                        radius: 5
                    },
                    {
                        label: "Max z-score",
                        data: Max,
                        backgroundColor: "green",
                        borderColor: "lightgreen",
                        fill: false,
                        lineTension: 0,
                        radius: 5
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                        fontColor: "#333",
                        fontSize: 16
                        }
                    }
                }
            });
        });

    });




</script>


@endsection