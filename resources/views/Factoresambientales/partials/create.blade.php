<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-uppercase text-bold-700" id="exampleModalCenterTitle">Nuevo Factor Ambiental</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Factor*</label>
                <input id="nom" type="text" class="form-control text-dark" v-model="addname">
                <label for="nom" class="text-dark float-left">Variable*</label>
                <select v-model="addvar" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="vari in variable" v-bind:value="vari.id_variable">@{{ vari.nombre_variable}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addFactor" data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
