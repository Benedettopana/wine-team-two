@extends('layouts.admin')

@section('content')

  <div class="container mb-5 ">
    <div class="row">
      <div class="col">
        <h1 class="mb-5">{{ $title . ' ' . $wine?->title }}</h1>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger " role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row">
      <div class="col">
        <form action="{{ $route }}" method="post">
          @csrf
          @method($method)
          <div class="mb-3">
            <label for="wine" class="form-label ">Nome Vino</label>
            <input type="text" name="wine" id="wine" class="form-control @error('wine') is-invalid @enderror"
              value="{{ old('wine', $wine?->wine) }}">
            @error('wine')
              <small class="text-danger">
                {{ $message }}
              </small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="winery" class="form-label ">Cantina</label>
            <input type="text" name="winery" id="winery" class="form-control @error('winery') is-invalid @enderror"
              value="{{ old('winery', $wine?->winery) }}">
            @error('winery')
              <small class="text-danger">
                {{ $message }}
              </small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="image" class="form-label ">Link Immagine</label>
            <input type="text" name="image" id="image" class="form-control"
              value="{{ old('image', $wine?->image) }}">
          </div>

          <div class="mb-3">
            <label for="location" class="form-label ">Location</label>
            <input type="text" name="location" id="location"
              class="form-control @error('location') is-invalid @enderror"
              value="{{ old('location', $wine?->location) }}">
            @error('location')
              <small class="text-danger">
                {{ $message }}
              </small>
            @enderror
          </div>
          {{-- <select name="flavor_id" class="form-select mb-3" aria-label="Default select example">
            @foreach ($flavors as $item)
              <option @if (old('flavor_id', $item?->flavors->id) == $item->id) selected @endif value="{{ $item->id }}">
                {{ $item->name }}
              </option>
            @endforeach

          </select> --}}

          {{-- <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Default checkbox
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
              <label class="form-check-label" for="flexCheckChecked">
                Checked checkbox
              </label>
            </div> --}}
          <div class="row row-cols-3">

            @foreach ($flavors as $flavor)
              <div class="form-check col" role="">
                <input type="checkbox" class="form-check-input" id="flavor_{{ $flavor->id }}" name="flavors[]"
                  value="{{ $flavor->id }}" @if (
                      ($errors->any() && in_array($flavor->id, old('flavors', []))) ||
                          (!$errors->any() && $wine?->flavors->contains($flavor))) checked @endif>
                <label class="form-check-label" for="flavor_{{ $flavor->id }}">
                  {{ $flavor->name }}
                  {{-- preghiamo --}}
                </label>
              </div>
            @endforeach
          </div>


          <div class="mb-3">
            <button type="submit" class="btn btn-warning" id="aggiorna">{{ $button }}</button>
          </div>
        </form>
      </div>
      </form>

    </div>
  </div>
  </div>



@endsection
