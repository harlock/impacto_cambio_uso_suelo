<div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="modal-header bg-light border">
                    <h4 class="modal-title text-dark text-bold-700 text-uppercase" id="topModalLabel">Editar Asignación de Criterio
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-group mb-3">
                            <label class="text-dark float-left" for="nameEdit">Factor*</label>
                            <select v-model="editname" class="form-control">
                                <option value="" disabled>Selecione uno</option>
                                <option v-for="fa in factor" v-bind:value="fa.id_factor">@{{ fa.nombre_factor}}</option>
                            </select>

                            <label class="text-dark float-left" for="nameEdit">Criterio*</label>
                            <select v-model="editcri" class="form-control">
                                <option value="" disabled>Selecione uno</option>
                                <option v-for="cri in criterio" v-bind:value="cri.id_criterio">@{{ cri.descripcion}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-icon btn-outline-success" data-dismiss="modal" @click="updateAsignacriterio">Aceptar</button>
            </div>
        </div>
    </div>
</div>
