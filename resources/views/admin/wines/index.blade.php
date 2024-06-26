@extends('layouts.admin')

@section('content')
    <div class="container-xl">

        @if (isset($_GET['toSearch']))
            <h4>Ricerca per: {{ $_GET['toSearch'] }} | Elementi trovati: {{ $count_search }} </h4>
        @endif

        <table class="table">
            @if (!$wines->isEmpty())
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome vino</th>
                        <th scope="col">Cantina</th>
                        <th scope="col">Aromi</th>
                        <th scope="col">Location</th>
                        <th scope="col">Azioni</th>
                    </tr>
            @endif
            </thead>
            <tbody>
                @forelse ($wines as $wine)
                    <tr>
                        <th>{{ $wine->id }}</th>
                        <td>{{ $wine->wine }}</td>
                        <td>{{ $wine->winery }}</td>
                        <td>
                            @forelse ($wine->flavors as $flavor)
                                <span class="badge text-bg-primary">{{ $flavor->name }}</span>

                            @empty
                                -
                            @endforelse

                        </td>
                        <td>{{ $wine->location }}</td>
                        <td class="m-0">
                            <div class="d-flex ">

                                <a href="{{ route('admin.wines.edit', $wine) }}" class="btn btn-warning me-2 "><i
                                        class="fa-solid fa-pencil m-0"></i></a>
                                <a href="{{ route('admin.wines.show', $wine) }}" class="btn btn-primary me-2 "><i
                                        class="fa-solid fa-eye m-0"></i></a>
                                @include('layouts.partials.formdelete')
                            </div>
                        </td>
                    </tr>
                @empty
                    <h3>Nessun risultato</h3>
                @endforelse


            </tbody>
        </table>
        <div class="row">
            <div class="paginator">{{ $wines->links('pagination::bootstrap-5') }}</div>
        </div>
    </div>
@endsection
