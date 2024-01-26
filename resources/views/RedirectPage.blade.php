<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$redirectData->title}}</title>
    <meta name="description" content="{{$redirectData->description}}">
    <meta property="og:title" content="{{$redirectData->title}}">
    <meta property="og:description" content="{{$redirectData->description}}">
    <meta property="og:image" content="{{$redirectData->image_path}}">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="refresh" content="0; url=https://{{$redirectUrl}}">
</head>
<body>
<div class="loader"></div>
<style>
    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 20% auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
</body>
</html>
