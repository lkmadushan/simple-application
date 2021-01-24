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
      <label for="country_code">Code</label>
      <input
        id="country_code"
        type="text"
        class="form-control @error('country_code') is-invalid  @enderror"
        value="{{ old('country_code', $resource->country_code) }}"
        name="country_code"
      >
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input
        id="name"
        type="text"
        class="form-control @error('name') is-invalid  @enderror"
        value="{{ old('name', $resource->name) }}"
        name="name"
      >
    </div>

    <button class="btn btn-primary">Save</button>
  </form>
</div>
