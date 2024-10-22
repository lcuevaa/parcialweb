<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Infracción</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{$infracciones->id ? route('infracciones.update',$infracciones) : route('infracciones.store')}}"
            method="post">
            @if($infracciones->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $infracciones->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="nombre">DNI</label>
                <input type="text" class="form-control" name="nombre" value="{{$infracciones->dni}}" required
                    placeholder="Ingrese nombre">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" name="fecha" value="{{$infracciones->fecha}}"
                    placeholder="Ingrese fecha">
            </div>
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" name="placainfraccion value=" {{$infracciones->placa}}"
                    placeholder="Ingrese placa">
            </div>
            <div class="form-group">
                <label for="infraccion">Infracción</label>
                <input type="text" class="form-control" name="infraccion" value="{{$infracciones->infraccion}}"
                    placeholder="Ingrese infracción">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" value="{{$infracciones->descripcion}}"
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