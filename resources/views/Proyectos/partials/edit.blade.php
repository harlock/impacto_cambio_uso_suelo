<div id="update_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="modal-header bg-light border">
                    <h4 class="modal-title text-dark text-bold-700 text-uppercase" id="topModalLabel">Editar Proyecto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-group mb-3">
                            <label class="text-dark float-left" for="nameEdit">Nombre del proyecto</label>
                            <input type="text" id="nameEdit" class="form-control text-uppercase" v-model="editname">
                            <label class="text-dark float-left" for="nameEdit">Descripción del proyecto</label>
                            <input type="text" id="nameEdit" class="form-control" v-model="editdes">
                            <label for="nom" class="text-dark">Compañía</label>
                            <select v-model="editcom" class="form-control">
                                <option value="" disabled>Selecione uno</option>
                                <option v-for="com in companias" v-bind:value="com.id_compania">@{{ com.nombre_compania }}</option>
                            </select>
                            <label class="text-dark" for="nameEdit">Tipo de Proyecto</label>
                            <select v-model="edittip" class="form-control">
                                <option value="" disabled>Selecione uno</option>
                                <option v-for="tip in tipos" v-bind:value="tip.id_tipoproyecto">@{{ tip.nombre_proyecto }}</option>
                            </select>
                            <label for="nom" class="text-dark">Colonia</label>
                            <select v-model="editcol" class="form-control" name="" id="">
                                <option value="" disabled>Selecione uno</option>
                                <option v-for="colonia in colonias" v-bind:value="colonia.id_colonia">@{{ colonia.nombre_colonia }}</option>
                            </select>
                            <label class="text-dark" for="nameEdit">Fecha</label>
                            <input type="text" id="fecha_edicion" class="form-control pickadate" v-model="editfec">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-icon btn-outline-success" data-dismiss="modal" @click="updateProyecto">Aceptar</button>
            </div>
        </div>
    </div>
</div>
