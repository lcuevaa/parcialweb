<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Categoría</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{$categoria->id ? route('categoria.update',$categoria) : route('categoria.store')}}"
            method="post">
            @if($categoria->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $categoria->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$categoria->nombre}}" required
                    placeholder="Ingrese nombre">
            </div>
            <div class="form-group">
                <label for="nombre">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="{{$categoria->descripcion}}"
                    placeholder="Ingrese descripción">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>