<DOCTYPE html>
<html>
<head>
  <title>Contact Email</title>
</head>
<body>
 <div style="
   background:  #06c;
   padding: 20px;
   text-align:  left;
   font-family:  sans-serif;
   color: #fff;
   font-size: 15px;
 ">
   <h2>{{$email_data['subject_description']}}</h2>
 </div>
 <div style="
   padding: 20px;
   padding-bottom: 10px;
   text-align: left;
   font-family: sans-serif;
   color: #000;
   font-size: 14px;
 ">
   <h3>Name: {{$email_data['full_name']}}</h3>
   <h3>Email Id: {{$email_data['email']}}</h3>
   <h3>Phone No: {{$email_data['phone']}}</h3>
   <h3>Message: {{$email_data['message_description']}}</h3>
 </div>
 
 <hr>
</body>
</html>