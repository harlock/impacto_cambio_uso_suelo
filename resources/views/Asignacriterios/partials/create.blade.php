<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-bold-700 text-uppercase" id="exampleModalCenterTitle">Nueva Asignación de Criterio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Factor*</label>
                <select v-model="addname" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="fa in factor" v-bind:value="fa.id_factor">@{{ fa.nombre_factor}}</option>
                </select>

                <label for="nom" class="text-dark float-left">Criterio*</label>
                <select v-model="addcri" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="cri in criterio" v-bind:value="cri.id_criterio">@{{ cri.descripcion}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addAsignacriterio" data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
