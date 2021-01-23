<div>
  @if($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group">
      <label for="role_id">Role</label>
      <select class="custom-select mr-sm-2" id="role_id" name="role_id">
        @foreach($roles as $role)
          <option
            value="{{ $role->id }}"
            @if(optional($resource)->role_id == $role->id) selected @endif
          >{{ $role->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input
        id="username"
        type="text"
        class="form-control @error('username') is-invalid  @enderror"
        value="{{ old('username', $resource->username) }}"
        name="username"
      >
    </div>

    <div class="form-group">
      <label for="first_name">First Name</label>
      <input
        id="first_name"
        type="text"
        class="form-control @error('first_name') is-invalid  @enderror"
        value="{{ old('first_name', $resource->first_name) }}"
        name="first_name"
      >
    </div>

    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input
        id="last_name"
        type="text"
        class="form-control @error('last_name') is-invalid  @enderror"
        value="{{ old('last_name', $resource->last_name) }}"
        name="last_name"
      >
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input
        id="email"
        type="email"
        class="form-control @error('email') is-invalid  @enderror"
        value="{{ old('email', $resource->email) }}"
        name="email"
      >
    </div>

    @if(!$resource->exists)
    <div class="form-group">
      <label for="password">Password</label>
      <input
        id="password"
        type="password"
        class="form-control @error('password') is-invalid  @enderror"
        name="password"
      >
    </div>

    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input
        id="password_confirmation"
        type="password"
        class="form-control @error('password_confirmation') is-invalid  @enderror"
        name="password_confirmation"
      >
    </div>
    @endif

    <button class="btn btn-primary">Save</button>
  </form>
</div>
