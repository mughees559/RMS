<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYNOPSIS SUBMITTION PAGE</title>
</head>
<body> 
<h1>Submit your Research work(Synopsis)</h1>
    <form action="store_synopsis" method="post" enctype="multipart/form-data">
    @csrf() 
    <input type="text" name="synopsis_holder">
    <input type="text" name="synopsis_supervisor">
    <input type="file" name="synopsis_docx">
    <br>
    <br> 
   
    
<button type="submit"> File Upload </button>
    </input>
    </form>

    
</body>
</html>