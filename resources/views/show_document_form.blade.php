<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>synopsis table</h2>
              
  <table class="table">
    <thead>
      <tr>
        <th>document holder</th> 
      
        <th>document teacher</th>
        <th>document</th>
      </tr>
    </thead>
    <tbody>
    @csrf()
    @foreach($documents as $document)
      <tr> 
     
        <td>{{$document->synopsis_holder}}</td>
        <td>{{$document->synopsis_supervisor}}</td>
        <td>    <a href = " {{ URL::to('upload/synopsisfolder', $document->synopsis_docx) }} "  >
                 
                 <button type="button" class="btn btn-primary">Download </button>


                </a>
        </td> 
        
      </tr> 
      @endforeach
     
    </tbody>
  </table>
</div>

</body>
</html>
