<!DOCTYPE html>
<html>
<head>
	<title>Invitation</title>
</head>
<body>
	{{Auth::user()->first_name}} send you an invitation email. kindly register by clicking on <a href="{{ route('signup') }}?referrer={{Auth::user()->profile->username }}" >Tutorsarus</a> link
</body>
</html>