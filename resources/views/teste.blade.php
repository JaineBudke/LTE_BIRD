<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<meta name="google-signin-client_id" content="526221733201-4of8pggdr8clpqs3mrbg1aj4nqduspqd.apps.googleusercontent.com">
</head>
<body>

<script src="https://apis.google.com/js/platform.js" async defer></script>


<a class="btn btn-social btn-google" href="{{route('redirectToProvider', ['google'])}}">
  <span class="fa fa-google"></span> Login with Google
</a>
 
<a class="btn btn-social btn-facebook" href="{{route('redirectToProvider', ['facebook'])}}">
  <span class="fa fa-facebook"></span> Login with Facebook
</a>



</body>
</html>

