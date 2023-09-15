<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<x-header />


<body>


<!-- upload file form -->
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <br>
    <br>


    <form action="{{url('/')}}/upload_file" enctype="multipart/form-data" method="post">
        @csrf
  <div class="mb-3">
  <label for="formFile" class="form-label">Select File to Share</label>
  <input class="form-control" type="file" name="formFile" id="formFile" required>
  </div>
  <div class="mb-3">
    <label for="passcode" class="form-label">Pass Code</label>
    <input type="text" class="form-control" name="passcode" id="passcode" placeholder="Put your's passcode[optional]">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Enter your's title[optional]">
  </div>
  <div class="mb-3">
    <label for="message" class="form-label">Message</label>
    <input type="text" class="form-control" name="message" id="message" placeholder="Enter your message[optional]">
  </div>
  
  <button type="submit" class="btn btn-success">Upload File</button>
</form>

    </div>
    <div class="col-3"></div>
</div>



</body>
</html>