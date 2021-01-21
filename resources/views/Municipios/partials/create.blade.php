<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-uppercase text-bold-700" id="exampleModalCenterTitle">Nuevo Municipio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Municipio*</label>
                <input id="nom" type="text" class="form-control text-dark" v-model="addname">
                <label for="nom" class="text-dark float-left">Estado*</label>
                <select v-model="addedo" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="edo in estado" v-bind:value="edo.id_estado">@{{ edo.nombre}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addMunicipio" data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
