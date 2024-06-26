    <header class="mb-5">



        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top ">
            <div class="container-fluid d-flex justify-content-between">

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">

                        <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"
                            href="{{ route('admin.wines.index') }}">Lista Vini</a>

                        {{-- <a class="nav-link {{ Route::currentRouteName() === 'wines.index' ? 'active' : '' }}"
                href="{{ route('wines.index') }}">Vini</a> --}}

                        <a class="nav-link {{ Route::currentRouteName() === 'wines.create' ? 'active' : '' }}"
                            href="{{ route('admin.wines.create') }}">Crea nuovo vino</a>

                    </div>
                </div>

                <div class="d-flex justify-content-center">

                    <form action=" {{ route('admin.wines.index') }} " method="GET" class="d-flex me-3" role="search">
                        <input name="toSearch" class="form-control me-2" type="search" placeholder="Cerca"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Cerca</button>
                    </form>

                    <div class="">
                        <p class="pt-3 me-3"> {{ Auth::user()->name }} </p>
                    </div>
                    <form class="align-content-center" action=" {{ route('logout') }} " method="POST"> @csrf
                        <button type="submit" class="btn btn-danger"><i
                                class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </div>
            </div>
        </nav>




    </header>
