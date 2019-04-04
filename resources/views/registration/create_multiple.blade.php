@extends('layouts.app')

@section('content')

<style>
table {
    display: block;
    max-height: 400px;
    overflow-y: scroll;
}
</style>

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fas fa-user-edit"></i>Register applicants
				</h2>

			</div>
			
		</div>

		<div class="panel-body">

		@if ($errors->any())
      		<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
              			<li>{{ $error }}</li>
            		@endforeach
        		</ul>
      		</div><br />
    	@endif
			
			<div class="col-lg-12">

				<input type="file" id="input-excel" >
				<button id="addRowBtn" class="btn btn-primary">Add rows</button>
				<button id="clipbtn" class="btn btn-primary">Use clipboard</button>
				
				<button id="bind" class="btn btn-danger">Delete rows</button>
				<button id="unbind"  class="btn btn-primary">Edit</button>

				<br><br>

				<div id="cliparea" style="display: none;">
					<p>Paste excel data here:</p>  
					<textarea id="excel_data" name="excel_data" style="width:100%;height:150px;font-size: 10px;"></textarea><br>
					<input type="button" id="generateTable" onclick="convert()" value="Genereate Table"  class="btn btn-primary" />
					<br>
				</div>

				
				<hr>

				<!-- <input type="button" onclick="saveTable()" value="Save-all"/> -->
				<label>  =>  Total records :</label>
				<label id="lblrows"></label>
				
				<br><br>
				
				<div class="table-responsive">

					<!-- store sheetjs table -->
					<div id="divSheetjs" style="visibility: hidden">
						<table id="sheetjsTable">

						</table>
					</div>

					<form id="multipleRegistrationForm" class="form-horizontal" role="form" method="post" action="{{ action('RegistrationController@store_multiple')}}">
					@csrf 

					<!-- div to create excel table from clipboard -->
					<div id="excelTable" class="table-responsive"></div>
						
						<table class="table table-bordered table-hover table-striped" id="multipleRegistrationTable">
							
							<thead>
								<tr>
									<th>Full Name</th>
									<th>Surname</th>
									<th>National ID</th>
									<th>Address line 1</th>
									<th>Address line 2</th>
									<th>Address line 3</th>
									<th>Telephone</th>
									<th>District</th>
									<th>A/L Index No</th>
									<th>Z-Score</th>
									<th>A/L sub1</th>
									<th>Result sub1</th>
									<th>A/L sub2</th>
									<th>Result sub2</th>
									<th>A/L sub3</th>
									<th>Result sub3</th>
									<th>A/L english</th>
									<th>O/L Year</th>
									<th>O/L English</th>
									<th>O/L Maths</th>
									<th>Priority</th>
								</tr>
							</thead>

							<tbody>
								
							</tbody>

						</table>

						<input type="submit" id="submitbtn" class="btn btn-primary" value="Submit" >

					</form>				

				</div>

			</div>

		</div>

	</div>


</div>


<script>

$(document).ready(function(){

	$('#input-excel').change(function(e){
		$('#clipbtn').prop('disabled', true);
		var reader = new FileReader();
		var chartData = [];
		reader.readAsArrayBuffer(e.target.files[0]);
		reader.onload = function(e) {
			var data = new Uint8Array(reader.result);
			var wb = XLSX.read(data,{type:'array'});
			var htmlstr = XLSX.write(wb,{ type:'binary',bookType:'html'});		
			$('#sheetjsTable')[0].innerHTML += htmlstr;

			$("#sheetjsTable tr").each(function(i){
				var fullname = $.trim($(this).find("td").eq(0).html());
				var surname = $.trim($(this).find("td").eq(1).html());
				var nic = $.trim($(this).find("td").eq(2).html());
				var address1 = $.trim($(this).find("td").eq(3).html());
				var address2 = $.trim($(this).find("td").eq(4).html());
				var address3 = $.trim($(this).find("td").eq(5).html());
				var telephone = $.trim($(this).find("td").eq(6).html());
				var district = $.trim($(this).find("td").eq(7).html());
				var al_index = $.trim($(this).find("td").eq(8).html());
				var al_zscore = $.trim($(this).find("td").eq(9).html());
				var al_sub1 = $.trim($(this).find("td").eq(10).html());
				var al_sub1_result = $.trim($(this).find("td").eq(11).html());
				var al_sub2 = $.trim($(this).find("td").eq(12).html());
				var al_sub2_result = $.trim($(this).find("td").eq(13).html());
				var al_sub3 = $.trim($(this).find("td").eq(14).html());
				var al_sub3_result = $.trim($(this).find("td").eq(15).html());
				var al_english = $.trim($(this).find("td").eq(16).html());
				var ol_year = $.trim($(this).find("td").eq(17).html());
				var ol_english = $.trim($(this).find("td").eq(18).html());
				var ol_maths = $.trim($(this).find("td").eq(19).html());
				var priority = $.trim($(this).find("td").eq(20).html());

				chartData.push({fullname:fullname, surname:surname, nic:nic, address1:address1, address2:address2, address3:address3, telephone:telephone,
					district:district, al_index:al_index, 	al_zscore:al_zscore, al_sub1:al_sub1, al_sub1_result:al_sub1_result, 
					al_sub2:al_sub2, al_sub2_result:al_sub2_result, al_sub3:al_sub3, al_sub3_result:al_sub3_result, al_english:al_english,
					ol_year:ol_year, ol_english:ol_english, ol_maths:ol_maths, priority:priority});
					
				$('#sheetjsTable').hide();
				
			});

			console.log(chartData);

			$.each(chartData, function(index, jasonObject){
				var tableRow = '';
				if(Object.keys(jasonObject).length>0){
			
					tableRow = '<tr>';
					$.each(Object.keys(jasonObject),function(i,key){
						tableRow += '<td><input type="text" class="form-control" value="'+jasonObject[key]+'"></td>';			
					});

					tableRow += '</tr>';
					$('#multipleRegistrationTable').append(tableRow);
					var currentTd = $('#multipleRegistrationTable tbody tr:last');
					currentTd.find('td:eq(0) input[type="text"]').attr('name','fullname[]');
					currentTd.find('td:eq(1) input[type="text"]').attr('name','surname[]');
					currentTd.find('td:eq(2) input[type="text"]').attr('name','nic[]');
					currentTd.find('td:eq(3) input[type="text"]').attr('name','address1[]');
					currentTd.find('td:eq(4) input[type="text"]').attr('name','address2[]');
					currentTd.find('td:eq(5) input[type="text"]').attr('name','address3[]');
					currentTd.find('td:eq(6) input[type="text"]').attr('name','telephone[]');
					currentTd.find('td:eq(7) input[type="text"]').attr('name','district[]');
					currentTd.find('td:eq(8) input[type="text"]').attr('name','al_index[]');
					currentTd.find('td:eq(9) input[type="text"]').attr('name','al_zscore[]');
					currentTd.find('td:eq(10) input[type="text"]').attr('name','al_sub1[]');
					currentTd.find('td:eq(11) input[type="text"]').attr('name','al_sub1_result[]');
					currentTd.find('td:eq(12) input[type="text"]').attr('name','al_sub2[]');
					currentTd.find('td:eq(13) input[type="text"]').attr('name','al_sub2_result[]');
					currentTd.find('td:eq(14) input[type="text"]').attr('name','al_sub3[]');
					currentTd.find('td:eq(15) input[type="text"]').attr('name','al_sub3_result[]');
					currentTd.find('td:eq(16) input[type="text"]').attr('name','al_english[]');
					currentTd.find('td:eq(17) input[type="text"]').attr('name','ol_year[]');
					currentTd.find('td:eq(18) input[type="text"]').attr('name','ol_english[]');
					currentTd.find('td:eq(19) input[type="text"]').attr('name','ol_maths[]');
					currentTd.find('td:eq(20) input[type="text"]').attr('name','priority[]');
				}
				countRows();
			});
		}
	});

	/*variable to hold the number of rows in the table*/
	var count = 0;
	countRows();

    /*deleting rows and cancel deleting*/
    var dlt = 1;
    var cncl = 0;

    var foo = function(){
    	$('#bind').prop('disabled', true);
    	$('#unbind').prop('disabled', false);
    	cncl=0;
    	dlt=1;
    	$("td").click(function(){
    		if(dlt==1){
    			$(this).closest("tr").remove();
				countRows();
    		} 
        });
    };

    var bar = function(){
    	cncl=1;
    	if(cncl==1){
    		$('#bind').prop('disabled', false);
    		$('#unbind').prop('disabled', true);
    		$("#bind").off("click","**");
    		dlt=0;
    	} 
    };

    $("body").on("click","#bind",foo);

    $("body").on("click","#unbind",bar);



	/*adding a row to the table at the end*/
    $("#addRowBtn").click(function(){
        //$('#multipleRegistrationTable>tbody:last-child').append('<tr><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td><td contenteditable="true"></td></tr>');
		$('#multipleRegistrationTable>tbody:last-child').append('<tr><td><input type="text" class="form-control fullname" name="fullname[]"></td><td><input type="text" class="form-control surname" name="surname[]"></td><td><input type="text" class="form-control nic" name="nic[]"></td><td><input type="text" class="form-control address1" name="address1[]"></td><td><input type="text" class="form-control address2" name="address2[]"></td><td><input type="text" class="form-control address3" name="address3[]"></td><td><input type="text" class="form-control telephone" name="telephone[]"></td><td><input type="text" class="form-control district" name="district[]"></td><td><input type="text" class="form-control al_index" name="al_index[]"></td><td><input type="text" class="form-control al_zscore" name="al_zscore[]"></td><td><input type="text" class="form-control al_sub1" name="al_sub1[]"></td><td><input type="text" class="form-control al_sub1_result" name="al_sub1_result[]"></td><td><input type="text" class="form-control al_sub2" name="al_sub2[]"></td><td><input type="text" class="form-control al_sub2_result" name="al_sub2_result[]"></td><td><input type="text" class="form-control al_sub3" name="al_sub3[]"></td><td><input type="text" class="form-control al_sub3_result" name="al_sub3_result[]"></td><td><input type="text" class="form-control al_english" name="al_english[]"></td><td><input type="text" class="form-control ol_year" name="ol_year[]"></td><td><input type="text" class="form-control ol_english" name="ol_english[]"></td><td><input type="text" class="form-control ol_maths" name="ol_maths[]"></td><td><input type="text" class="form-control priority" name="priority[]"></td></tr>');
		countRows();
	});

	$(window).keydown(function(){
		if(event.keycode == 13){
			event.preventDefault();
			$('#multipleRegistrationTable>tbody:last-child').append('<tr><td><input type="text" class="form-control fullname" name="fullname[]"></td><td><input type="text" class="form-control surname" name="surname[]"></td><td><input type="text" class="form-control nic" name="nic[]"></td><td><input type="text" class="form-control address1" name="address1[]"></td><td><input type="text" class="form-control address2" name="address2[]"></td><td><input type="text" class="form-control address3" name="address3[]"></td><td><input type="text" class="form-control telephone" name="telephone[]"></td><td><input type="text" class="form-control district" name="district[]"></td><td><input type="text" class="form-control al_index" name="al_index[]"></td><td><input type="text" class="form-control al_zscore" name="al_zscore[]"></td><td><input type="text" class="form-control al_sub1" name="al_sub1[]"></td><td><input type="text" class="form-control al_sub1_result" name="al_sub1_result[]"></td><td><input type="text" class="form-control al_sub2" name="al_sub2[]"></td><td><input type="text" class="form-control al_sub2_result" name="al_sub2_result[]"></td><td><input type="text" class="form-control al_sub3" name="al_sub3[]"></td><td><input type="text" class="form-control al_sub3_result" name="al_sub3_result[]"></td><td><input type="text" class="form-control al_english" name="al_english[]"></td><td><input type="text" class="form-control ol_year" name="ol_year[]"></td><td><input type="text" class="form-control ol_english" name="ol_english[]"></td><td><input type="text" class="form-control ol_maths" name="ol_maths[]"></td><td><input type="text" class="form-control priority" name="priority[]"></td></tr>');
			countRows();
		}
	});


    /*disable clipbtn if add rowsbtn is clicked*/ 
    $("#addRowBtn").click(function(){
    	$('#clipbtn').prop('disabled', true);
    });


    //disable delete button at begining
    $('#unbind').prop('disabled', true);

    /*show clipboard area and disable #addRowBtn*/
    $("#clipbtn").click(function(){
		$('#multipleRegistrationTable').remove();
		$('#addRowBtn').prop('disabled', true);
    	$("#cliparea").show();
    });


	/*VALIDATIONS FOR TABLE DATA*/

	$(document).on("click","#submitbtn",function(){

		var validate = true;

		//check number of table cells per row
		$('#multipleRegistrationTable').find('tr').each(function(){
			var tdCount = $(this).children('td').length;
			console.log(tdCount);
			if(tdCount==21){
				validate = true;
			}else{
				validate = false;
			}
		});

		//fullname validations
		$('#multipleRegistrationTable').find('tr input[name="fullname[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^[a-zA-Z ]+$/i).test($(this).val()))){
				$(this).css("background","#FA8072");
				alert("validate 2");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//surname validations
		$('#multipleRegistrationTable').find('tr input[name="surname[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^[a-zA-Z .]+$/i).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//nic validations 
		$('#multipleRegistrationTable').find('tr input[name="nic[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
				console.log("1");
		 	}
			else if(!( (/^[0-9]{12}$/).test($(this).val()) | (/^[0-9]{9}[vVxX]$/).test($(this).val()) )){
				console.log((/^[0-9]{12}$/).test($(this).val()));
				console.log((/^[0-9]{9}$/).test($(this).val()));
				$(this).css("background","#FA8072");
				validate = false;
				console.log("2");
			}
			else{
				$(this).css("background","white");
			}
		});

		//address validations
		$('#multipleRegistrationTable').find('tr input[name="address1[]"] , tr input[name="address2[]"] , tr input[name="address3[]"] ').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else{
				$(this).css("background","white");
			}
		});

		//telephone validations
		$('#multipleRegistrationTable').find('tr input[name="telephone[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^\d{10}$/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//district validations
		$('#multipleRegistrationTable').find('tr input[name="district[]"]').each(function(){
			this.value = this.value.toUpperCase();
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^(AMPARA|ANURADHAPURA|BADULLA|BATICOLOA|COLOMBO|GALLE|GAMPAHA|HAMBANTOTA|JAFFNA|KALUTHARA|KANDY|KEGALLE|KILINOCHCHI|KURUNEGALA|MANNAR|MATALE|MATARA|MONARAGALA|MULLAITIU|NUWARA ELIYA|POLLONNARUWA|PUTTLAM|RATNAPURA|TRINCOMALEE|VAVUNIA)\b/).test($(this).val()))){
				console.log("aaaa");
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//al index validations
		$('#multipleRegistrationTable').find('tr input[name="al_index[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^\d{7}$/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//al zscore validations
		$('#multipleRegistrationTable').find('tr input[name="al_zscore[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^\(?(\d{1})\)?[.]?(\d{4})$/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//al subjects validations
		$('#multipleRegistrationTable').find('tr input[name="al_sub1[]"] , tr input[name="al_sub2[]"] , tr input[name="al_sub3[]"]').each(function(){
			this.value = this.value.toUpperCase();
			 if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^(COMBINED MATHEMATICS|PHYSICS|CHEMISTRY|HIGHER MATHEMATICS|BIOLOGY)\b/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//al subject combination validations
		

		//subject result validations
		$('#multipleRegistrationTable').find('tr input[name="al_sub1_result[]"] , tr input[name="al_sub2_result[]"] , tr input[name="al_sub3_result[]"] , tr input[name="al_english[]"] ,  tr input[name="ol_english[]"] ,  tr input[name="Ol_maths[]"] ').each(function(){
			this.value = this.value.toUpperCase();
			 if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^(A|B|C|S|F)\b/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//ol year validations
		$('#multipleRegistrationTable').find('tr input[name="ol_year[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^(20)\d{2}$/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});

		//priority validations
		$('#multipleRegistrationTable').find('tr input[name="priority[]"]').each(function(){
		 	if($(this).val()==""){
				$(this).css("background","#FA8072");
		 		validate = false;	 
		 	}
			else if(!((/^[1-9]\d*$/).test($(this).val()))){
				$(this).css("background","#FA8072");
				validate = false;
			}
			else{
				$(this).css("background","white");
			}
		});


		//if any errors alert the user before submit data
		if(validate){
			alert("validated");
		}else{
			alert("Do validations before submit");
			return false;
		}

	});

});


/*excel copy paste functionality and generate table*/
function convert(){

	var data = $('textarea[name=excel_data]').val();
	//console.log(data);
	var rows = data.split("\n");
	//console.log(rows);
	var table = $('<table id="multipleRegistrationTable" />');
	table.append('<thead><tr><th>Full Name</th><th>Surname</th><th>National ID</th><th>Address line 1</th><th>Address line 2</th><th>Address line 3</th><th>Telephone</th><th>District</th><th>A/L Index No</th><th>Z-Score</th><th>A/L sub1</th><th>Result sub1</th><th>A/L sub2</th><th>Result sub2</th><th>A/L sub3</th><th>Result sub3</th><th>A/L english</th><th>O/L Year</th><th>O/L Mathematics</th><th>O/L English</th><th>Priority</th></tr></thead>')

	for(var y in rows){
	  	var cells = rows[y].split("\t");
		//console.log(cells);
	  	var row = $('<tr />');
	  	for(var x in cells){
			if(x==0)
	  			row.append('<td><input type="text" name="fullname[]" value="'+cells[x]+'"></td>');
			else if(x==1)
				row.append('<td><input type="text" name="surname[]" value="'+cells[x]+'"></td>');
			else if(x==2)
				row.append('<td><input type="text" name="nic[]" value="'+cells[x]+'"></td>');
			else if(x==3)
				row.append('<td><input type="text" name="address1[]" value="'+cells[x]+'"></td>');
			else if(x==4)
				row.append('<td><input type="text" name="address2[]" value="'+cells[x]+'"></td>');
			else if(x==5)
				row.append('<td><input type="text" name="address3[]" value="'+cells[x]+'"></td>');
			else if(x==6)
				row.append('<td><input type="text" name="telephone[]" value="'+cells[x]+'"></td>');
			else if(x==7)
				row.append('<td><input type="text" name="district[]" value="'+cells[x]+'"></td>');
			else if(x==8)
				row.append('<td><input type="text" name="al_index[]" value="'+cells[x]+'"></td>');
			else if(x==9)
				row.append('<td><input type="text" name="al_zscore[]" value="'+cells[x]+'"></td>');
			else if(x==10)
				row.append('<td><input type="text" name="al_sub1[]" value="'+cells[x]+'"></td>');
			else if(x==11)
				row.append('<td><input type="text" name="al_sub1_result[]" value="'+cells[x]+'"></td>');
			else if(x==12)
				row.append('<td><input type="text" name="al_sub2[]" value="'+cells[x]+'"></td>');
			else if(x==13)
				row.append('<td><input type="text" name="al_sub2_result[]" value="'+cells[x]+'"></td>');
			else if(x==14)
				row.append('<td><input type="text" name="al_sub3[]" value="'+cells[x]+'"></td>');
			else if(x==15)
				row.append('<td><input type="text" name="al_sub3_result[]" value="'+cells[x]+'"></td>');
			else if(x==16)
				row.append('<td><input type="text" name="al_english[]" value="'+cells[x]+'"></td>');
			else if(x==17)
				row.append('<td><input type="text" name="ol_year[]" value="'+cells[x]+'"></td>');
			else if(x==18)
				row.append('<td><input type="text" name="ol_english[]" value="'+cells[x]+'"></td>');
			else if(x==19)
				row.append('<td><input type="text" name="ol_maths[]" value="'+cells[x]+'"></td>');
			else if(x==20)
				row.append('<td><input type="text" name="priority[]" value="'+cells[x]+'"></td>');
	  	}
	  	table.append(row);
	}
	$('#excelTable').html(table);
}


/*function to count the number of rows in the dynamic table*/
function countRows(){
	count = $('#multipleRegistrationTable tbody tr').length;
	$('#lblrows').html(count);
}


</script>
    
@endsection
        

