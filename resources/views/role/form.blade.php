{{Form::token()}}

<div class="row">
    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="name">Nombre</label>

            <input type="text" name="name" class="form-control" value="{{ $row->name }}"
                    @if($row->name === 'admin') readonly="readonly" @endif>
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
    <div class="col-12" style="margin-left: 15px;">
        <h5>Asignacion de permisos</h5>
        @foreach ($permissions as $permission)
            <div>
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{$permission->id}}"
                    @if($row->hasPermissionTo($permission->id))
                        checked
                    @endif
                    >{{ $permission->name }}
                    <em>({{ $permission->description ?: 'Sin Descripcion' }})</em>
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="float-right">
            <a href="{{ $link_cancel }}" class="btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="ml-2 btn colorSea">Guardar</button>
        </div>
    </div>
</div>
