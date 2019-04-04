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
				
				<form id="singleRegistrationForm" class="form-horizontal" method="post" action="{{ url('/registration',['id'=> $applicant->id])}}">
                    @method('PATCH')
                    @csrf
					<!-- full name -->
					<div class="form-group">
						<label class="col-md-3 control-label">Full Name</label>
						<div class="col-md-6">
							<input type="text" id="fullname" name="fullname" class="form-control" value="{{$applicant->fullname}}" >
						</div>
					</div>

					<!-- surname -->
					<div class="form-group">
						<label class="col-md-3 control-label">Surname with initials</label>
						<div class="col-md-6">
							<input type="text" name="surname" class="form-control" value="{{$applicant->surname}}">
						</div>
					</div>

					<!-- National ID -->
					<div class="form-group">
						<label class="col-md-3 control-label">National ID</label>
						<div class="col-md-6">
							<input type="text" id="nationalid" name="nic" class="form-control" value="{{$applicant->nic}}">
						</div>
					</div>
					
					<!-- Address -->
					<div class="form-group">
						<label class="col-md-3 control-label">Address</label>
						<div class="col-md-6">
							<input type="text" name="address" class="form-control" value="{{$applicant->address}}">
						</div>
					</div>


					<!-- Telephone No -->
					<div class="form-group">
						<label class="col-md-3 control-label">Telephone No</label>
						<div class="col-md-6">
							<input type="text" name="telephone" class="form-control" value="{{$applicant->telephone}}">
						</div>
					</div>

					<!-- District -->
					<div class="form-group">
						<label class="col-md-3 control-label">District in which the candidate sat for the G.C.E(A/L) Examination <label class="previousyear"></label></label>
						<div class="col-md-6">
							<select type="text" name="district" class="form-control" >
								<option>{{$applicant->district}}</option>
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
							<input type="number" name="alindex" class="form-control" value="{{$applicant->al_index}}">
						</div>
					</div>

					<!-- Z-Score -->
					<div class="form-group">
						<label class="col-md-3 control-label">Z-Score</label>
						<div class="col-md-6">
							<input type="number" name="zscore" class="form-control" value="{{$applicant->al_zscore}}">
						</div>
					</div>

					<!-- G.C.E A/L Results -->
					<div class="form-group">

						<label class="col-md-3 control-label">G.C.E A/L Results</label>

							<div class="col-md-6">

								<br><br>
								<label class="control-label col-sm-3">Subject 1</label>
								<div class="col-sm-4">
									<select type="text" name="al_sub1" class="form-control">
										<option>{{$applicant->al_sub1}}</option>
										<option value="">--Select subject 1--</option>
										<option value="HIGHER MATHEMATICS">Higher Mathematics</option>
										<option value="PHYSICS">Physics</option>
										<option value="BIOLOGY">Biology</option>
										<option value="COM. MATHEMATICS">Com. Mathematics</option>
										<option value="CHEMISTRY">Chemistry</option>
										<option value="ICT">ICT</option>
									</select>
								</div>	

								<div class="col-sm-4">
									<select type="text" name="al_sub1_result" class="form-control">
										<option>{{$applicant->al_sub1_result}}</option>
										<option value="">--Select Result 1--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="S">S</option>
										<option value="F">F</option>
									</select>
								</div>

								<br><br>

								<label class="control-label col-sm-3">Subject 2</label>
								<div class="col-sm-4">
									<select type="text" name="al_sub2" class="form-control">
										<option>{{$applicant->al_sub2}}</option>
										<option value="">--Select subject 2--</option>
										<option value="HIGHER MATHEMATICS">Higher Mathematics</option>
										<option value="PHYSICS">Physics</option>
										<option value="BIOLOGY">Biology</option>
										<option value="COM. MATHEMATICS">Com. Mathematics</option>
										<option value="CHEMISTRY">Chemistry</option>
										<option value="ICT">ICT</option>
									</select>
								</div>	

								<div class="col-sm-4">
									<select type="text" name="al_sub2_result" class="form-control">
										<option>{{$applicant->al_sub2_result}}</option>
										<option value="">--Select Result 2--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="S">S</option>
										<option value="F">F</option>
									</select>
								</div>

								<br><br>

								<label class="control-label col-sm-3">Subject 3</label>
								<div class="col-sm-4">
									<select type="text" name="al_sub3" class="form-control">
										<option>{{$applicant->al_sub3}}</option>
										<option value="">--Select subject 3--</option>
										<option value="HIGHER MATHEMATICS">Higher Mathematics</option>
										<option value="PHYSICS">Physics</option>
										<option value="BIOLOGY">Biology</option>
										<option value="COM. MATHEMATICS">Com. Mathematics</option>
										<option value="CHEMISTRY">Chemistry</option>
										<option value="ICT">ICT</option>
									</select>
								</div>	

								<div class="col-sm-4">
									<select type="text" name="al_sub3_result" class="form-control">
										<option>{{$applicant->al_sub3_result}}</option>
										<option value="">--Select Result 3--</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="S">S</option>
										<option value="F">F</option>
									</select>
								</div>

								<br><br><br>
								
						</div>

					</div>

					<!-- G.C.E A/L English Results -->
					<div class="form-group">
						<label class="col-md-3 control-label">G.C.E A/L English Results</label>
						<div class="col-md-6">
							<select type="text" name="alenglish" class="form-control">
								<option>{{$applicant->al_english}}</option>
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
							<input type="text" name="olyear" class="form-control" value="{{$applicant->ol_year}}">
						</div>
					</div>
					
					<!-- G.C.E O/L Mathematics Results -->
					<div class="form-group">
						<label class="col-md-3 control-label">G.C.E O/L Mathematics Result</label>
						<div class="col-md-6">
							<select type="text" name="olmathematics" class="form-control">
								<option>{{$applicant->ol_maths}}</option>
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
								<option>{{$applicant->ol_english}}</option>
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
							<input type="number" name="priority" class="form-control" value="{{$applicant->priority}}">
						</div>
					</div>

					<!-- buttons -->
					<div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
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





		$("#singleRegistrationForm").validate({
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
				
				address: "required",
				
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

				alenglish: "required",

				olyear: {
					required: true,
					range: [new Date().getFullYear()-15,new Date().getFullYear()]
				},

				olmathematics: "required",

				olenglish: "required",

				priority: "required"
				
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
					required: "Priority value is required"
				}


			}

		});
	});
</script>

    
@endsection
        

