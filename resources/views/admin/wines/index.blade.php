@extends('layouts.admin')

@section('content')

<div class="container-xl">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome vino</th>
            <th scope="col">Cantina</th>
            <th scope="col">Location</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($wines as $wine )

            <tr>
              <th>{{ $wine->id }}</th>
              <td>{{ $wine->wine }}</td>
              <td>{{ $wine->winery }}</td>
              <td>{{ $wine->location }}</td>
              <td>
                <a href="{{route('admin.wines.edit', $wine)}}" class="btn btn-warning mx-2"><i class="fa-solid fa-pencil"></i></a>
                <a href="{{route('admin.wines.show', $wine)}}" class="btn btn-primary mx-2"><i class="fa-solid fa-eye"></i></a>
                @include('layouts.partials.formdelete')
              </td>
            </tr>
            @endforeach


        </tbody>
    </table>
    <div class="row">
        <div class="paginator">{{ $wines->links('pagination::bootstrap-5') }}</div>
    </div>
</div>

@endsection
