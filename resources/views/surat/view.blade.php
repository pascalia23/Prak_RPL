<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $surat->perihal }}</title>
    <style type="text/css">
        body, html
        {
            margin: 0; padding: 0; height: 100%; overflow: hidden;
        }

        #content
        {
            position:absolute; left: 0; right: 0; bottom: 0; top: 0px; 
        }
    </style>
</head>
<body>
    <div id="content">
        <iframe style="height: 100%; width:100%" src="https://docs.google.com/gview?url={{ url('/').$surat->file }}&embedded=true" frameborder="0">
        </iframe>
    </div>
</body>
</html>