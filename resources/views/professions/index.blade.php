@extends('layout')

@section('title', 'Profesiones')

@section('content')
<form method="get" action="{{ route('users.index') }}">

<div class="d-flex justify-content-between align-items-end mb-3">
    <h1 class="pb-1">Listado de profesiones</h1>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">nivel de educacion</th>
            <th scope="col">salario</th>
            <th scope="col">eperiencia requerida</th>
            <th scope="col">Perfiles</th>
            <th scope="col">Acciones</th>
            <div class="input-group">
                    <input type="search2" name="search2" value="{{ request('search2') }}"
                           class="form-control form-control-sm" placeholder="Buscar...">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Buscar</button>

        </tr>
    </thead>
    <tbody>
        @if($professions->isNotEmpty())

        @foreach($professions as $profession)
        <tr>
            <td scope="row">{{ $profession->id }}</td>
            <td>{{ $profession->title }} <br>{{ $profession->sector }}</td>
            <td>{{ $profession->education_level }}</td>
            <td>{{ $profession->salary }}</td>
            <td>{{ $profession->experience_required }}</td>


            <td>{{ $profession->profiles_count }}</td>
            <td>
                @if($profession->profiles_count == 0)
                <form action="{{ url('profesiones/' . $profession->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link"><span class="material-symbols-outlined">delete</span>
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>No hay profesiones registrados</p>
@endif
</form>
@endsection