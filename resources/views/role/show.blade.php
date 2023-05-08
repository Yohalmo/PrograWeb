@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'Roles')
@section("scripts")

@endsection

@section('body')
<x-card-info>
    @slot('backLink',route('role.index'))

    @slot('cardBody')
    <div class="row">
        <div class="col-12 col-md-4">
            <p><b>Nombre</b> : <br>{{ $row->name }}</p>
        </div>
        <div class="col-12 col-md-8">
            <p><b>Descripcion</b> : <br>{{ $row->description }}</p>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <h4>Permisos Asignados</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($row->permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @endslot
</x-card-info>

@endsection
