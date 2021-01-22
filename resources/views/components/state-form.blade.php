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
      <label for="country_id">Country</label>
      <select class="form-control" id="country_id" name="country_id">
        @foreach($countries as $country)
          <option class=""
            value="{{ $country->id }}"
            @if(optional($state)->country_id == $country->id) selected @endif
          >{{ $country->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input
        id="name"
        type="text"
        class="form-control @error('name') is-invalid  @enderror"
        value="{{ old('name', $state->name) }}"
        name="name"
      >
    </div>

    <button class="btn btn-primary">Save</button>
  </form>
</div>
