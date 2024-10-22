@extends('admin.index')

@section('user')
    <div class="container d-flex justify-content-between align-items-center mt-4">
        <h2 class="text-primary"> Appartamenti di {{ Auth::user()->name }} {{ Auth::user()->surname }} </h2>
        <div>
            <a class="btn btn-success" href="{{ route('admin.apartments.create') }}"> Aggiungi un appartamento <i
                    class="fa-solid fa-plus"> </i></a>
        </div>
    </div>
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-danger d-block">
                {{ session('delete') }}
            </div>
        @endif

        <div class="table-responsive mt-5">
            <table class="table rounded backtable">
                <thead>
                    <tr>
                        <th scope="col"> Immagine </th>
                        <th scope="col"> Titolo </th>
                        <th scope="col"> Sponsorizzato </th>
                        <th scope="col"> Visibile </th>
                        <th scope="col"> Azioni </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr class="">
                            <td class="w-25">
                                <a href="{{ route('admin.apartments.show', $apartment) }}">
                                    <img class="w-50 rounded" src="{{ asset('storage/' . $apartment->img_path) }}"
                                        alt="{{ $apartment->img_name }}" onerror="this.src='/img/default-image.jpg'">
                                </a>
                            </td>
                            <td class=""> {{ $apartment->title }} </td>
                            <td> {{ $apartment->sponsors->count() }} </td>
                            <td> {{ $apartment->is_visible ? 'Si' : 'No' }} </td>
                            <td class="w-10">
                                <div class="d-flex align-items-center gap-3 flex-wrap">
                                    <a class="btn btn-warning text-light"
                                        href="{{ route('admin.apartments.edit', $apartment) }}">
                                        <i class="fa-solid fa-pen">
                                        </i>
                                    </a>
                                    <button class="btn btn-secondary">
                                        <a href="{{ route('admin.sponsor.index') }}">
                                            <i class="fa-solid fa-sack-dollar"></i>
                                        </a>
                                    </button>

                                    <!-- bottone trigger modale -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        <i class="fa-solid fa-trash text-light"></i>
                                    </button>

                                    <!-- modale -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1000">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma
                                                        Eliminazione</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler eliminare l'appartamento "{{ $apartment->title }}"?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>

                                                    <!-- form eliminazione -->
                                                    <form action="{{ route('admin.apartments.destroy', $apartment) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Conferma</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fine modale -->

                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @empty($apartments)
                        <li> You own no apartments. </li>
                    @endempty
                </tbody>
            </table>
        </div>

    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Wg4A6lB1J6LOuYxgAs5f0bb5RmXsO1Huxy5Dke++dJzD5y" crossorigin="anonymous">
    </script>
@endsection
