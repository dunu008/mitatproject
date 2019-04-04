@extends('layouts.app')

@section('content')

<style>
    input[type=text]{
        width:40%;
    }

</style>

<div class="row">

	<div class="col-lg-12">
		
		<div class="panel panel-default">

			<div class="panel-heading">
				
				<h2 class="panel-title">
					<i class="fa fa-fw fa-edit"></i>Edit test results
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

                <form id="editResultForm" method="post" action="{{ url('/test-results',['id'=> $applicant->id]) }}">
                @method('PATCH')
                @csrf
                        <div>
                            <div class="form-group">
                                <label>Index Number:</label>
                                <input type="text" style="width: 8%;" class="form-control" name="name" readonly value="{{ $applicant->id }}"  />
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-sm-4 sectionA">
                            <div class="form-group">
                                <label>Section A correct :</label>
                                <input id="correctA" type="text" class="form-control correct" name="correctA" />
                            </div>

                            <div class="form-group">
                                <label>Section A incorrect:</label>
                                <input id="incorrectA" type="text" class="form-control incorrect" name="incorrectA" />
                            </div>

                            <div class="form-group">
                                <label>Section A Total :</label>
                                <input id="totalA" type="text" class="form-control total" name="totalA" readonly value={{ $applicant->sectionA }} >
                            </div>

                        </div>


                        <div class="col-sm-4 sectionB">
                            <div class="form-group">
                                <label>Section B correct :</label>
                                <input id="correctB" type="text" class="form-control correct" name="correctB" />
                            </div>

                            <div class="form-group">
                                <label>Section B incorrect:</label>
                                <input id="incorrectB" type="text" class="form-control incorrect" name="incorrectB" />
                            </div>

                            <div class="form-group">
                                <label>Section B Total :</label>
                                <input id="totalB" type="text" class="form-control total" name="totalB" readonly value={{ $applicant->sectionB }} >
                            </div>

                        </div>

                        <div class="col-sm-4 sectionC">

                            <div class="form-group">
                                <label>Section C correct :</label>
                                <input id="correctC" type="text" class="form-control correct" name="correctC" />
                            </div>

                            <div class="form-group">
                                <label>Section C incorrect:</label>
                                <input id="incorrectC" type="text" class="form-control incorrect" name="incorrectC" />
                            </div>

                            <div class="form-group">
                                <label>Section C Total :</label>
                                <input id="totalC" type="text" class="form-control total" name="totalC" readonly value={{ $applicant->sectionC }} >
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                </form>
				
			</div>

		</div>

	</div>

</div>

<script>
    $(document).ready(function(){

        //VALIDATIONS
        $("#editResultForm").validate({
            onkeyup: function(element) {
				this.element(element);
				//console.log('onkeyup fired');
			},
			
			onfocusout: function(element) {
				this.element(element);
				//console.log('onfocusout fired');
			},

			rules: {
				correctA: {
					//required: true,
					digits: true
				},
                incorrectA:{
                    //required: true,
                    digits: true
                },
                totalA:{
                    //required: true,
                    number: true
                },
                correctB: {
					//required: true,
					digits: true
				},
                incorrectB:{
                    //required: true,
                    digits: true
                },
                totalB:{
                    //required: true,
                    number: true
                },
                correctC: {
					//required: true,
					digits: true
				},
                incorrectC:{
                    //required: true,
                    digits: true
                },totalC:{
                    //required: true,
                    number: true
                }
            }
        });



        $(document).on('keyup',['#correctA','#incorrectA'],function(){
            var ca = $("#correctA").val();
            var ica = $("#incorrectA").val();
            var ta = parseFloat(ca)-parseFloat(ica)*0.25;
            $("#totalA").attr('value',ta);
        });

        $(document).on('keyup',['#correctB','#incorrectB'],function(){
            var cb = $("#correctB").val();
            var icb = $("#incorrectB").val();
            var tb = parseFloat(cb)-parseFloat(icb)*0.25;
            $("#totalB").attr('value',tb);
        });

        $(document).on('keyup',['#correctB','#incorrectB'],function(){
            var cc = $("#correctC").val();
            var icc = $("#incorrectC").val();
            var tc = parseFloat(cc)-parseFloat(icc)*0.25;
            $("#totalC").attr('value',tc);
        });

    });
</script>


@endsection