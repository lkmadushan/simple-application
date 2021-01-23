<div>
  @error('name')
  <div class="alert alert-danger" role="alert">
    {{ $message }}
  </div>
  @enderror

  <form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

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
