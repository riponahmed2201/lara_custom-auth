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
        <form autocomplete="off" action="{{ route('forgot_check') }}" method="POST">
          @csrf
          <div class="group">
            <label for="email">Enter Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email">
          </div><br>
          <input type="submit" value="Forgot Password" id="submit">
        </form>
      </div>
    </div>
</body>
</html>