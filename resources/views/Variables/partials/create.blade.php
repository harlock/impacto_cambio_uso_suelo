<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-bold-700 text-uppercase" id="exampleModalCenterTitle">Nueva Variable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Variable*</label>
                <input id="nom" type="text" class="form-control text-dark" v-model="addname">
                <label for="nom" class="text-dark float-left">Subsistema*</label>
                <select v-model="addsub" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="sub in subsistema" v-bind:value="sub.id_subsistema">@{{ sub.nombre_subsistema}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addVariable" data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
