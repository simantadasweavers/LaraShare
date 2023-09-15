<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Download</title>
</head>
<x-header />
<body>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <a href="{{env('URL2')}}/files/{{$file}}">
        <button class="btn btn-warning">DOWNLOAD</button>
    </a>

    </div>
    <div class="col-3"></div>
</div>

</body>
</html>