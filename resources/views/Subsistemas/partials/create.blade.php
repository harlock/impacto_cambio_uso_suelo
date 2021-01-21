<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-uppercase text-bold-700" id="exampleModalCenterTitle">Nuevo Subsistema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Subsistema*</label>
                <input id="nom" type="text" class="form-control text-dark" v-model="addname">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addSubsistema" data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
