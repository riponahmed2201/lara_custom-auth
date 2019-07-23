<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<div class="wrapper" >
  <div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    <form autocomplete="off" action="{{ route('register.store') }}" method="POST">
    	@csrf
      <div class="group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name">
      </div>
      <div class="group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email">
      </div>
      <div class="group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter Your Username">
      </div>
      <div class="group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number">
      </div>
      <div class="group">
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" placeholder="Enter Your Password">
      </div>
       <div class="group">
        <label for="confirm_password">Confirm Password:</label>
        <input id="confirm_password" type="password" name="confirm_password" placeholder="Enter Your Confirm Password">
      </div>
     	<br>
      <input type="submit" value="Register" id="submit">
    </form>
  </div>
</div>
</body>
</html>