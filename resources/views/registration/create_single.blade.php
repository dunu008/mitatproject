@extends('layouts.app')

@section('content')

<div class="row">
	
	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">

				<h2 class="panel-title">
					<i class="fas fa-user-edit"></i>Register applicant for year <label class="previousyear"></label>/<label id="currentyear"></label>
				</h2>

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
				
				<form id="singleRegistrationForm" class="form-horizontal" method="post" action="{{ action('RegistrationController@store_single')}}">
                    @csrf
					<!-- full name -->
					<div class="form-group">
						<label class="col-md-3 control-label">Full Name</label>
						<div class="col-md-6">
							<input type="text" id="fullname" name="fullname" class="form-control" placeholder="Ex: Firstname Middlename Surname" >
						</div>
					</div>

					<!-- surname -->
					<div class="form-group">
						<label class="col-md-3 control-label">Surname with initials</label>
						<div class="col-md-6">
							<input type="text" name="surname" class="form-control" placeholder="Ex: Surname F M">
						</div>
					</div>

					<!-- National ID -->
					<div class="form-group">
						<label class="col-md-3 control-label">National ID</label>
						<div class="col-md-6">
							<input type="text" id="nationalid" name="nic" class="form-control" placeholder="Ex: 123456789v or 00123456789">
						</div>
					</div>
					
					<!-- Address line 1 -->
					<div class="form-group">
						<label class="col-md-3 control-label">Address line 1</label>
						<div class="col-md-6">
							<input type="text" name="addressline1" class="form-control" placeholder="Ex: 111A">
						</div>
					</div>

					<!-- Address line 2 -->
					<div class="form-group">
						<label class="col-md-3 control-label">Address line 2</label>
						<div class="col-md-6">
							<input type="text" name="addressline2" class="form-control" placeholder="Ex: Street Name">
						</div>
					</div>

					<!-- Address line 3 -->
					<div class="form-group">
						<label class="col-md-3 control-label">Address line 3</label>
						<div class="col-md-6">
							<input type="text" name="addressline3" class="form-control" placeholder="Ex: City Name">
						</div>
					</div>

					<!-- Telephone No -->
					<div class="form-group">
						<label class="col-md-3 control-label">Telephone No</label>
						<div class="col-md-6">
							<input type="text" name="telephone" class="form-control" placeholder="Ex: 0123456789">
						</div>
					</div>

					<!-- District -->
					<div class="form-group">
						<label class="col-md-3 control-label">District in which the candidate sat for the G.C.E(A/L) Examination <label class="previousyear"></label></label>
						<div class="col-md-6">
							<select type="text" name="district" class="form-control">
								<option value="">--Select district--</option>
								<option value="AMPARA">Ampara</option>
								<option value="ANURADHAPURA">Anuradhapura</option>
								<option value="BADULLA">Badulla</option>
								<option value="BATTICOLOA">Baticoloa</option>
								<option value="COLOMBO">Colombo</option>
								<option value="GALLE">Galle</option>
								<option value="GAMPAHA">Gampaha</option>
								<option value="HAMBANTOTA">Hambatota</option>
								<option value="JAFFNA">Jaffna</option>
								<option value="KALUTHARA">Kaluthara</option>
								<option value="KANDY">Kandy</option>
								<option value="KEGALLE">Kegalle</option>
								<option value="KILINOCHCHI">Kilinochchi</option>
								<option value="KURUNEGALA">Kurunegala</option>
								<option value="MANNAR">Mannar</option>
								<option value="MATALE">Matale</option>
								<option value="MATARA">Matara</option>
								<option value="MONARAGALA">Monaragala</option>
								<option value="MULLAITIU">Mullaitiu</option>
								<option value="NUWARA ELIYA">Nuwara Eliya</option>
								<option value="POLLONNARUWA">Pollonnaruwa</option>
								<option value="PUTTLAM">Puttlam</option>
								<option value="RATNAPURA">Ratnapura</option>
								<option value="TRINCOMALEE">Trincomalee</option>
								<option value="VAVUNIA">Vavunia</option>
							</select>
						</div>
					</div>

					<!-- A/L Index No -->
					<div class="form-group">
						<label class="col-md-3 control-label">A/L Index No</label>
						<div class="col-md-6">
							<input type="text" name="alindex" class="form-control" placeholder="Ex: 1234567">
						</div>
					</div>

					<!-- Z-Score -->
					<div class="form-group">
						<label class="col-md-3 control-label">Z-Score</label>
						<div class="col-md-6">
							<input type="text" name="zscore" class="form-control" placeholder="Ex: 1.2345">
						</div>
					</div>

					<!-- G.C.E A/L Results -->
					<div class="form-group">

						<label class="col-md-3 control-label">G.C.E A/L Results</label>

							<div class="col-md-6">

								<!-- AL subject 1 -->
								<br><br>
								<div class="col-sm-6">
									<select type="text" name="al_sub1" class="form-control alsubjects" id="al_sub1">
										<option value="">--Choose A/L Subject 1--</option>
										<option value="HIGHER MATHEMATICS">Higher Mathematics</option>
										<option value="PHYSICS">Physics</option>
										<option value="COMBINED MATHEMATICS">Combined Mathematics</option>
										<option value="BIOLOGY">Biology</option>
										<option value="CHEMISTRY">Chemistry</option>
										<option value="ICT">ICT</option>
									</select>
								</div>	
								<div class="col-sm-4">
									<select type="text" name="al_sub1_result" class="form-control alsubjects" id="al_sub1_result">
										<option value="">--Result 1--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="S">S</option>
										<option value="F">F</option>
									</select>
								</div>
								<br><br>

								<!-- AL subject 2 -->
								<br><br>
								<div class="col-sm-6">
									<select type="text" name="al_sub2" class="form-control alsubjects" id="al_sub2" >
										<option value="">--Choose A/L Subject 2--</option>
										<option value="HIGHER MATHEMATICS">Higher Mathematics</option>
										<option value="PHYSICS">Physics</option>
										<option value="COMBINED MATHEMATICS">Combined Mathematics</option>
										<option value="BIOLOGY">Biology</option>
										<option value="CHEMISTRY">Chemistry</option>
										<option value="ICT">ICT</option>
									</select>
								</div>	
								<div class="col-sm-4">
									<select type="text" name="al_sub2_result" class="form-control alsubjects" id="al_sub2_result">
										<option value="">--Result 2--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="S">S</option>
										<option value="F">F</option>
									</select>
								</div>	
								<br><br>

								<!-- AL subject 3 -->
								<br><br>
								<div class="col-sm-6">
									<select type="text" name="al_sub3" class="form-control alsubjects" id="al_sub3" >
										<option value="">--Choose A/L Subject 3--</option>
										<option value="HIGHER MATHEMATICS">Higher Mathematics</option>
										<option value="PHYSICS">Physics</option>
										<option value="COMBINED MATHEMATICS">Combined Mathematics</option>
										<option value="BIOLOGY">Biology</option>
										<option value="CHEMISTRY">Chemistry</option>
										<option value="ICT">ICT</option>
									</select>
								</div>	
								<div class="col-sm-4">
									<select type="text" name="al_sub3_result" class="form-control alsubjects" id="al_sub3_result">
										<option value="">--Result 3--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="S">S</option>
										<option value="F">F</option>
									</select>
								</div>	
								<br><br><br>

								
								<input type="text" name="alsubjectsresulterror" id="alsubjectsresulterror" value="" hidden ><br>
								<input type="text" name="alsubjectserror" id="alsubjectserror" value="" hidden><br>


							</div>

					</div>
					<br>

					<!-- G.C.E A/L English Results -->
					<div class="form-group">
						<label class="col-md-3 control-label">G.C.E A/L English Result</label>
						<div class="col-md-6">
							<select type="text" name="alenglish" class="form-control">
									<option value="">--Select Result--</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="S">S</option>
									<option value="F">F</option>
							</select>
						</div>
					</div>

					<!-- G.C.E O/L Year -->
					<div class="form-group">
						<label class="col-md-3 control-label">G.C.E O/L Year</label>
						<div class="col-md-6">
							<input type="text" name="olyear" class="form-control" placeholder="Ex: 2010">
						</div>
					</div>
					
					<!-- G.C.E O/L Mathematics Results -->
					<div class="form-group">
						<label class="col-md-3 control-label">G.C.E O/L Mathematics Result</label>
						<div class="col-md-6">
							<select type="text" name="olmathematics" class="form-control">
									<option value="">--Select Result--</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="S">S</option>
									<option value="F">F</option>
							</select>
						</div>
					</div>

					<!-- G.C.E O/L English Results -->
					<div class="form-group">
						<label class="col-md-3 control-label">G.C.E O/L English Result</label>
						<div class="col-md-6">
							<select type="text" name="olenglish" class="form-control">
									<option value="">--Select Result--</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="S">S</option>
									<option value="F">F</option>
							</select>
						</div>
					</div>

					<!-- priority -->
					<div class="form-group">
						<label class="col-md-3 control-label">Priority (order no) given in UGC application for B.Sc. Honours in MIT</label>
						<div class="col-md-6">
							<input type="text" name="priority" class="form-control" placeholder="Ex: 123">
						</div>
					</div>

					<!-- buttons -->
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-3">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" id="submitbtn" form-control>
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

	var past = new Date().getFullYear()-1;
	var present = new Date().getFullYear();
	$('.previousyear').html(past);
	$('#currentyear').html(present);

	$(document).ready(function(){

		jQuery.validator.addMethod("lettersonly", function(value, element) {
  			return this.optional(element) || /^[a-zA-Z\s.]+$/i.test(value);
		}, "Letters,spaces and dots only please"); 

		jQuery.validator.addMethod("checkid", function(value, element) {
  			return this.optional(element) ||  /^\d{12}$/.test(value) || /^[0-9]{9}[vVxX]$/.test(value);
		}, "Invalid national id number"); 

		jQuery.validator.addMethod("checktp", function(value, element) {
  			return this.optional(element) ||  /^\d{10}$/.test(value);
		}, "Please enter 10 digits for telephone number"); 

		jQuery.validator.addMethod("checkalindex", function(value, element) {
  			return this.optional(element) ||  /^\d{7}$/.test(value);
		}, "Please enter a valid AL index number"); 

		jQuery.validator.addMethod("checkzscore", function(value, element) {
  			return this.optional(element) ||  /^\(?(\d{1})\)?[.]?(\d{4})$/.test(value);
		}, "Invalid zscore value"); 

		jQuery.validator.addMethod("alcompulsorysubjects", function(value, element) {
  			return this.optional(element) ||  /^\subject_combination\b$/.test(value);
		}, "Invalid subject combination"); 

		jQuery.validator.addMethod("alresults", function(value, element) {
  			return this.optional(element) ||  /^\need_C_or_above\b$/.test(value);
		}, "Require C pass or above for Higher Mathematics, Physics, or Combined Mathematics to qualify for the aptitude test"); 



		$("#singleRegistrationForm").validate({

			onkeyup: function(element) {
				this.element(element);
				//console.log('onkeyup fired');
			},
			
			onfocusout: function(element) {
				this.element(element);
				//console.log('onfocusout fired');
			},

			//validate hidden inputs->al subjects
			ignore: "",

			rules: {
				
				fullname: {
					required: true,
					lettersonly: true
				},
				
				surname: {
					required: true,
					lettersonly: true
				},
				
				nic: {
					required: true,
					checkid: true
				},
				
				addressline1: "required",

				addressline2: "required",

				addressline3: "required",
				
				telephone: {
					required: true,
					checktp: true
				},

				district: "required",

				alindex: {
					required: true,
					checkalindex: true
				},

				
				zscore: {
					required: true,
					checkzscore: true
				},

				al_sub1: "required",
				al_sub2: "required",
				al_sub3: "required",

				al_sub1_result: "required",
				al_sub2_result: "required",
				al_sub3_result: "required",


				alsubjectserror: {
					alcompulsorysubjects: true
				},

				alsubjectsresulterror: {
					alresults: true
				},

				alenglish: "required",

				olyear: {
					required: true,
					range: [new Date().getFullYear()-15,new Date().getFullYear()]
				},

				olmathematics: "required",

				olenglish: "required",

				priority: {
					required: true,
					digits: true
				}
				
			},

			messages: {
				
				fullname: {
					required: "Full name required"
				},
				
				surname:{
					required: "Surname required"
				},

				nic:{
					required: "National id required"
				},

				addressline1:{
					required: "Address required"
				},

				addressline2:{
					required: "Address required"
				},

				addressline3:{
					required: "Address required"
				},

				telephone:{
					required: "Telephone number required"
				},

				district:{
					required: "District required"
				},

				alindex:{
					required: "A/L index number required"
				},

				zscore:{
					required: "A/L zscore required"
				},

				al_sub1:{
					required: "Provide subject"
				},

				al_sub2:{
					required: "Provide subject"
				},

				al_sub3:{
					required: "Provide subject"
				},

				al_sub1_result:{
					required: "Provide result"
				},

				al_sub2_result:{
					required: "Provide result"
				},

				al_sub3_result:{
					required: "Provide result"
				},

				alenglish: {
					required: "A/L English result is required"
				},

				olyear: {
					required: "O/L examination year is required",
					range: "Enter a valid year"
				},

				olmathematics: {
					required: "O/L Mathematics result is required"
				},

				olenglish: {
					required: "O/L English result is required"
				},

				priority: {
					required: "Priority value is required",
					digits: "Enter a valid number"
				}

			}

		});


		var arraySubjects = [];
		var arrayResult = [];
		var foundCompulsory = false;

		$(document).on("click focusout",".alsubjects",function(){

			arraySubjects[0] = $("#al_sub1").val();
			arraySubjects[1] = $("#al_sub2").val();
			arraySubjects[2] = $("#al_sub3").val();

			arrayResult[0] = $("#al_sub1_result").val();
			arrayResult[1] = $("#al_sub2_result").val();
			arrayResult[2] = $("#al_sub3_result").val();

			//console.log(arraySubjects);
			//console.log(arrayResult);

			if($.inArray("HIGHER MATHEMATICS",arraySubjects)>-1){
				foundCompulsory = true;
			}else if($.inArray("PHYSICS",arraySubjects)>-1){
				foundCompulsory = true;
			}else if($.inArray("COMBINED MATHEMATICS",arraySubjects)>-1){
				foundCompulsory = true;
			}else{
				foundCompulsory = false;
			}

			if(foundCompulsory==true){
					$("#alsubjectsresulterror").val("");
			}
			else{
				$("#alsubjectsresulterror").val("need_C_or_above");
			}

			if(arraySubjects[0]=="HIGHER MATHEMATICS" & (arrayResult[0]=="A" | arrayResult[0]=="B" | arrayResult[0]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[1]=="HIGHER MATHEMATICS" & (arrayResult[1]=="A" | arrayResult[1]=="B" | arrayResult[1]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[2]=="HIGHER MATHEMATICS" & (arrayResult[2]=="A" | arrayResult[2]=="B" | arrayResult[2]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[0]=="PHYSICS" & (arrayResult[0]=="A" | arrayResult[0]=="B" | arrayResult[0]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[1]=="PHYSICS" & (arrayResult[1]=="A" | arrayResult[1]=="B" | arrayResult[1]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[2]=="PHYSICS" & (arrayResult[2]=="A" | arrayResult[2]=="B" | arrayResult[2]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[0]=="COMBINED MATHEMATICS" & (arrayResult[0]=="A" | arrayResult[0]=="B" | arrayResult[0]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[1]=="COMBINED MATHEMATICS" & (arrayResult[1]=="A" | arrayResult[1]=="B" | arrayResult[1]=="C")){
				$("#alsubjectsresulterror").val("");
			}else if(arraySubjects[2]=="COMBINED MATHEMATICS" & (arrayResult[2]=="A" | arrayResult[2]=="B" | arrayResult[2]=="C")){
				$("#alsubjectsresulterror").val("");
			}else{
				$("#alsubjectsresulterror").val("need_C_or_above");
			}

			if(arraySubjects[0]==arraySubjects[1] | arraySubjects[0]==arraySubjects[2] | arraySubjects[1]==arraySubjects[2]){
				$("#alsubjectserror").val("subject_combination");
			}else{
				$("#alsubjectserror").val("");
			}
		
			$("#singleRegistrationForm").validate().form();

		});



	});
		
</script>
  
@endsection
        

