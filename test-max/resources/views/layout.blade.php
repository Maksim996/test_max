<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <menu-component></menu-component>
        
        {{-- <example-component></example-component> --}}
        <router-view></router-view>
        {{-- <my-table-component></my-table-component> --}}
    </div>

    <script src="js/app.js"></script>
</body>
</html>