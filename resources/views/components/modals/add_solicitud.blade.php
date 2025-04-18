<!-- Add Solicitud Modal -->
<div class="modal fade" id="add_solicitudes" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('solicitudes.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Beneficiario <span class="text-danger">*</span></label>
                        <select class="form-control" name="beneficiario_id" required>
                            <option value="">Seleccione un beneficiario</option>
                            @foreach($beneficiarios as $beneficiario)
                                <option value="{{ $beneficiario->id }}">{{ $beneficiario->Nombre }} ({{ $beneficiario->Cedula }})</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Categoría <span class="text-danger">*</span></label>
                        <select class="form-control" name="categoria" required>
                            <option value="">Seleccione</option>
                            <option value="medicamentos">Medicamentos</option>
                            <option value="equipments">Equipo médico</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" name="descripcion" placeholder="Detalles de la solicitud"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Registrar Solicitud</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Solicitud Modal -->
