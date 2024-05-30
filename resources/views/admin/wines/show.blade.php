@extends('layouts.admin')

@section('content')

  <div class="container mb-1 my-5">

    <div class="row">
      <div class="col">
        <h1 class="mb-5">Dettagli</h1>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <img src="{{ $wine->image }}" class="card-img-top" alt="{{ $wine->wine }}">
      </div>
      <div class="col">
        <h5 class="card-title mb-2">{{ $wine->wine }}</h5>
        <div>
          @if (count($wine->flavors) > 0)
            <p>Aromi:
              <br>
              @foreach ($wine->flavors as $flavor)
                <span class=" badge text-bg-warning "> {{ $flavor->name }} </span>
              @endforeach
            </p>
          @endif
        </div>
        <p class="card-text">{{ $wine->winery }}</p>
        <p class="card-text">{{ $wine->rating_average }}</p>
        <p class="card-text">{{ $wine->rating_reviews }}</p>
        <p class="card-text">{{ $wine->location }}</p>



        <div class="d-flex mb-3">
          <a href="{{ route('admin.wines.edit', $wine) }}" class="btn btn-warning mx-2 h-25"><i
              class="fa-solid fa-pencil"></i></a>
          @include('layouts.partials.formdelete')
          <a href="{{ route('admin.wines.index') }}" class="btn btn-success mx-2" style="width: 150px">Torna ai Vini</a>

        </div>


      </div>
    </div>
  </div>

@endsection
{{--
@section('title')
    Details Comic
@endsection --}}
