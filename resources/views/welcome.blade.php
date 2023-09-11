<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>
<body>
 <div>
    @if (Auth::check())
      <h1>Hello, {{Auth::user()->username}}</h1>
      <form action="/logout" method="post">
        @csrf
          <button type="submit" class="underline">Logout</button>
      </form>
      <form action="/file" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="fileUpload" id="fileUpload" class="my-5">
        <button class="btn-primary">Upload file</button>
      </form>
      @if ($errors->any())
        <div class="alert alert-danger mt-2 mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <table class="manage-files border mt-5">
        <thead>
          <th class="title-content-table">ID</th>
          <th class="title-content-table">File</th>
          <th class="title-content-table">Type</th>
          <th class="title-content-table">Size</th>
          <th class="title-content-table">Uploaded at</th>
          <th class="title-content-table w-32"></th>
        </thead>
        <tbody>
          @foreach ($listFile as $file)
            <tr>
              <td class="title-content-table">{{ $file['id'] }}</td>
              <td class="title-content-table">{{ $file['name'] }}</td>
              <td class="title-content-table">{{ $file['type'] }}</td>
              <td class="title-content-table">{{ $file['size'] }}</td>
              <td class="title-content-table">{{ $file['created_at'] }}</td>
              <td class="title-content-table">
                <form action="file/delete/<?php echo $file['id']; ?>" method="post">
                  <button type="submit" class="btn-delete" value={{ $file['id'] }} name="fileId">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>You are not logged in.</p>
    @endif
 </div>
</body>
</html>