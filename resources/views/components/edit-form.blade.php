<div>
  @extends('layouts.editForm')
  @section('edit-content')
 
  <br>
      
  <div class="card">
    <div class="card-header">
      <h2 class="text-georgia">
        Update User Form
      </h2>
    </div>
    <div class="card-body">
      
      @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ Session::get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      
      <form action="{{ route('user.edit.auth') }}" method="POST">
        @csrf
        <input type="hidden" name="userId" value="{{ $user->id }}">
        <div class="form-group">
          <label for="name">Full Name:</label>
          <input class="form-control" type="text" disabled placeholder="{{ $user->name }}">
        </div>
        <br>
        <div class="form-group">
          <label for="firstname">Firstname: </label>
          <input class="form-control" type="text" name="firstname" value="{{ $user->firstname }}" required autofocus>
          @error('firstname')
            <span style="color:red">{{ $message }}. e.g., John</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="middlename">Middlename: </label>
          <input class="form-control" type="text" name="middlename" value="{{ $user->middlename }}">
          @error('middlename')
            <span style="color:red">{{ $message }}. eg., Svartholm</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="lastname">Lastname: </label>
          <input class="form-control" type="text" name="lastname" value="{{ $user->lastname }}" required>
          @error('lastname')
            <span style="color:red">{{ $message }}. e.g., Doe</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="email">Email: </label>
          <br>
          <input class="form-control" type="email" name="email" value="{{ $user->email }}" required>
          @error('email')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="password">New Password: </label>
          <input class="form-control" type="text" name="password" placeholder="You can leave this empty">
          @error('password')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password: </label>
          <input class="form-control" type="text" name="password_confirmation" placeholder="You can leave this empty">
          @error('password_confirmation')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="role">Role:</label>
          
          <select class="form-control" name="role">
            <option value="{{ $user->role }}" selected>
             {{ $user->role }}
            </option>
            <option value="{{ $user->role == 'user' ? 'admin' : 'user' }}">
              {{ $user->role == 'user' ? 'admin' : 'user' }}
            </option>
          </select>
          
          @error('role')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-grouo">
          <button class="form-control btn btn-success" type="submit" onclick="return confirm('Are you sure you want to update?')">
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
  
  @stop  

</div>