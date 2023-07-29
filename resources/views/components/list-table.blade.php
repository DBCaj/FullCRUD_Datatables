<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @extends('layouts.main')
  @section('list-table')
  
  @if(Session::get('success'))
    <div>
      {{ Session::get('success') }}
    </div>
  @endif
  
  <center><h2 class="text-georgia">User List</h2></center>
  
  <div style="overflow-x:auto">
    <table id="myTable" class="display table table-bordered">
      <thead>    
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
              <a class="style-edit-icon" href="{{ route('user.edit', $user->id) }}">
                <x-edit-icon />
              </a>
              <a class="style-delete-icon" href="{{ route('user.delete', $user->id) }}" onclick="return confirm('Are you sure you want to delete?')">
                <x-delete-icon />
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
      
  @stop 
  
</body>
</html>