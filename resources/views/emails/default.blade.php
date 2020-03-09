<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h4>{{$data['subject']}}</h4>
<p>{{$data['message']}}</p>
<hr>
<p>{{$user->organisation->name}}</p>
<p>{{$user->organisation->email}}</p>
<p>{{$user->name}}</p>
</body>
</html>