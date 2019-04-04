<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>   
    
    <title>MIT Aptitude Test Results</title>

</head>


<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center" style="margin-top:3%;">
                <header>
                    <h4>UNIVERSITY OF KELANIYA</h4>
                    <h4>B.Sc (Honours) Degree in Management & Information Technology (MIT) <span><label class="previousyear"></label>/<label class="currentyear"></label></span></h4>
                    <h4>Aptitude Test <span><label class="currentyear"></label></span></h4>
                    <hr>
                </header> 
            </div> 
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <form>
                    <label>Enter A/L index number : </label>
                    <input type="text" name="al_index">
                    <input type="submit" value="check">
                </form>
            </div>
        </div>
    </div>
        
</body>


<script>
	var past = new Date().getFullYear()-1;
	var present = new Date().getFullYear();
	$('.previousyear').html(past);
	$('.currentyear').html(present);
</script>


</html>
