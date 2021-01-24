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
      <label for="state_id">State</label>
      <select class="custom-select mr-sm-2" id="state_id" name="state_id">
        @foreach($states as $state)
          <option
            value="{{ $state->id }}"
            @if(optional($resource)->state_id == $state->id) selected @endif
          >{{ $state->name }}</option>
        @endforeach
      </select>
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
