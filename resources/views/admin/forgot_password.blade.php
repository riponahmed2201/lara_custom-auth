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
        <form autocomplete="off" action="{{ route('forgot_new',$user->id) }}" method="POST">
          @csrf
          <div class="group">
            <label for="old_password">Old Password:</label>
            <input type="text" id="old_password" name="old_password" placeholder="Enter your Old Password">
          </div>
          <div class="group">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" placeholder="Enter your Password">
          </div>
          <div class="group">
            <label for="confirm_password">Confirm Password:</label>
            <input id="confirm_password" type="password" name="confirm_password" placeholder="Enter your Confirm Password">
          </div>
          <br>
          <input type="submit" value="Change Password" id="submit">
        </form>
      </div>
    </div>
</body>
</html>