<DOCTYPE html>
<html>
<head>
    <title>Contact Email</title>
</head> 
<body>
<h2>Dear <b>{{$email_data['name']}}</b></h2>
<br>
<p>
	{{ $email_data['description'] }}
</p>
</body> 
</html>