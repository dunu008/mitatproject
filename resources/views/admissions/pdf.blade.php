<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- <table class="table table-bordered">
      <tr>
        <td>
          {{$applicant->fullname}}
        </td>
        <td>
          {{$applicant->address}}
        </td>
      </tr>
    </table> -->
    <h2>UNIVERSITY OF KELANIYA, SRI LANKA</h2>
    <h3>ADMISSION CARD</h3>
    <h3>Bachelor of Science(Honours) Degree in <br> Management and Information Technology (MIT) </h3>
    <h3>Aptitude Test</h3>

    <label>University Index No :</label>
    <label>AT - {{$applicant->id}}</label>
    <br><br>

    <label>Address :</label>
    <label>{{$applicant->address}}</label>
    <br><br>

    <label>A/L Index No :</label>
    <label>{{$applicant->al_index}}</label>
    <br><br>

    <label>NIC No :</label>
    <label>{{$applicant->nic}}</label>
    <br><br>

    <label>Venue :</label>
    <label>{{$applicant->venue['name']}}</label>
    <br><br>


  </body>
</html>