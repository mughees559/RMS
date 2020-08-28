<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacherpic</title>
</head>
<body> 
<h1>welcome to pic upload teacher pic</h1>
    <form action="uploadteacherpic" method="post" enctype="multipart/form-data">
    @csrf()
    <input type="file" name="img">
    <br>
    <br> 
<button type="submit"> File Upload </button>
    </input>
    </form>

    
</body>
</html>