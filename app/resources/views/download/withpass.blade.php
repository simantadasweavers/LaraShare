<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Processing</title>
</head>

<x-header />

<body>
    
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <!-- form -->
    <form action="{{url('/')}}/file_passcode_validate" method="POST">
        @csrf
   <input type="hidden" value="{{$filename}}" name="filename" required>
  <div class="mb-3">
    <label for="passcode" class="form-label">Pass Code</label>
    <input type="text" class="form-control" name="passcode" id="passcode" placeholder="Enter your file's passcode to download the file" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
    <div class="col-3"></div>
</div>


</body>
</html>