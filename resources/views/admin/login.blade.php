<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
        <form autocomplete="off" action="{{ route('admin_login.check') }}">
          <div class="group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username">
          </div>
          <div class="group">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" placeholder="Enter your Password">
          </div>
          <a href="{{ route('forgot') }}" class="forget-link">Forgot password?</a>
          <input type="submit" value="Login" id="submit">
        </form>
      </div>
    </div>
</body>
</html>