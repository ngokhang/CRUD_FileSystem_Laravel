<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-500">
  <div class="h-full flex justify-center items-center">
    <form action="/auth/register" class="w-1/3 flex flex-col gap-y-5 px-2 py-4 justify-center border rounded-lg bg-white" method="POST">
      <p class="block w-full text-3xl font-bold text-center self-start">Register</p>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="w-full">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" class="input-auth">
      </div>
      <div class="w-full">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" placeholder="Password" class="input-auth">
      </div>
      <div class="w-full">
        <label for="confirmPassword">Confirm password</label>
        <input type="text" name="password_confirmation" id="confirmPassword" placeholder="Confirm password" class="input-auth">
      </div>
      <div class="w-full">
        <label for="email">Email address</label>
        <input type="email" name="email" id="email" placeholder="Email" class="input-auth">
      </div>
      <div class="w-full">
        <button type="submit" class="block px-2 py-3 text-white bg-slate-400 w-full border rounded-md">Register</button>
      </div>
    </form>
  </div>
</body>
</html>