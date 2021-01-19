<div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="modal-header bg-light border">
                    <h4 class="modal-title text-dark text-bold-700 text-uppercase" id="topModalLabel">Editar Variable
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-group mb-3">
                            <label class="text-dark float-left" for="nameEdit">Variable</label>
                            <input type="text" id="nameEdit" class="form-control" v-model="editname">

                            <label class="text-dark float-left" for="nameEdit">Subsistema</label>
                            <select v-model="editsub" class="form-control">
                                <option value="" disabled>Selecione uno</option>
                                <option v-for="sub in subsistema" v-bind:value="sub.id_subsistema">@{{ sub.nombre_subsistema}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-icon btn-outline-success" data-dismiss="modal" @click="updateVariable">Aceptar</button>
            </div>
        </div>
    </div>
</div>
