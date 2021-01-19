<div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="modal-header bg-light border">
                    <h4 class="modal-title text-dark text-uppercase text-bold-700" id="topModalLabel">Editar USUARIO
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-group mb-3">
                            <label for="nom" class="text-dark float-left">Nombre</label>
                            <input id="nom" type="text" class="form-control text-dark" v-model="editname">
                            <label for="nom" class="text-dark float-left">Primer Apellido</label>
                            <input id="nom" type="text" class="form-control text-dark" v-model="editap">
                            <label for="nom" class="text-dark float-left">Segundo Apellido</label>
                            <input id="nom" type="text" class="form-control text-dark" v-model="editam">
                            <label for="nom" class="text-dark float-left">Email</label>
                            <input id="nom" type="text" class="form-control text-dark" v-model="editemail">
                            <label for="nom" class="text-dark float-left">Tipo de Usuario</label>
                            <select v-model="edittip" class="form-control">
                                <option disabled>Selecione uno</option>
                                <option v-for="tipu in tipouser" v-bind:value="tipu.id_tipo">@{{ tipu.descripcion}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline-success" data-dismiss="modal" @click="updateUser">Aceptar</button>
            </div>
        </div>
    </div>
</div>
