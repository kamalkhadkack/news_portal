<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>

    <h1>Dear{{$date['name'] }}</h1>
      <p>{{ $date['message'] }}</p>
      <p>
        Regards
      </p>
</body>
</html>
