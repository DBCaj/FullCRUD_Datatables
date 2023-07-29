<div>
  <div class="card">
    <div class="card-header">
      
      <h2 class="text-georgia">Add User Form</h2>
     
      @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ Session::get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      
    </div>
    <div class="card-body">
      <form action="{{ route('user.add.auth') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="firstname">Firstname: </label>
          <input class="form-control" type="text" name="firstname" value="{{ old('firstname') }}" required autofocus>
          @error('firstname')
            <span style="color:red">{{ $message }}. e.g., John</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="middlename">Middlename: </label>
          <input class="form-control" type="text" name="middlename" value="{{ old('name') }}">
          @error('middlename')
            <span style="color:red">{{ $message }}. eg., Svartholm</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="lastname">lastname: </label>
          <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}" required autofocus>
          @error('lastname')
            <span style="color:red">{{ $message }}. e.g., Doe</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="email">Email: </label>
          <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
          @error('email')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="password">Password: </label>
          <input class="form-control" type="password" name="password" class="form-control" required>
          @error('password')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password: </label>
          <input class="form-control" type="password" name="password_confirmation" required>
          @error('password_confirmation')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div class="form-group">
          <label for="role">Role: </label>
            <select class="form-control" name="role" value="">
              <option value="user" selected>
                User
              </option>
              <option value="admin">
                Admin
              </option>
            </select>
          @error('role')
            <span style="color:red">{{ $message }}</span>
          @enderror
        </div>
        <br>
        <div>
          <button class="btn btn-danger" type="reset" onclick="return confirm('Are you sure you want to clear all fields?')">Clear</button>
          <button class="btn btn-success" type="submit" onclick="return confirm('Are you sure you want to submit?')">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>