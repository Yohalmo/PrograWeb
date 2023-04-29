@extends('templates.MainTemplate')
@section('pretittle', 'Vista general')
@section('tittle', 'Roles')
@section("scripts")

@endsection

@section('body')
<x-card-info>
    @slot('backLink',route('admin.user.index'))

    @slot('cardBody')
    <form method="post" class=" m-4 p-4" action="{{ route('admin.role.update' , $row->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>

                    <input type="text" name="name" class="form-control" value="{{ $row->name }}" @if($row->name === 'admin') readonly="readonly" @endif>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control" value="{{ $row->description }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 row" style="margin-left: 15px;">
                <h2 class="col-12 mt-3 mb-4">Asignacion de permisos</h2>
                @foreach ($permissions as $permission)
                    <div class="col-xl-3 col-md-4 col-sm-12 mb-3 mt-2">
                        <div class="card p-2">
                            <label class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="{{$permission->id}}" @if($row->hasPermissionTo($permission->id))
                                checked
                                @endif
                                >{{ $permission->name }}
                                <br>
                                <em>({{ $permission->description ?: 'Sin Descripcion' }})</em>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <div class="float-right">
                    <a href="{{ route('admin.role.index') }}" class="btn grisUno">
                        <i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Cancelar
                    </a>
                    <button type="submit" class="ml-2 btn btn-colorGB">
                        <i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;Guardar
                    </button>
                </div>
            </div>
        </div>
    </form>
    @endslot
</x-card-info>
@endsection
