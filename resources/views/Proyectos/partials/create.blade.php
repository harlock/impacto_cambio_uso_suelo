<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-uppercase text-bold-700" id="exampleModalCenterTitle">Nuevo Proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Nombre del Proyecto*</label>
                <input id="nom" type="text" class="form-control text-dark text-uppercase" v-model="addname">
                <label for="nom" class="text-dark float-left">Descripción del proyecto*</label>
                <input id="nom" type="text" class="form-control text-dark" v-model="adddes">
                <label for="nom" class="text-dark">Compañía*</label>
                <select v-model="addcom" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="com in companias" v-bind:value="com.id_compania">@{{ com.nombre_compania }}</option>
                </select>
                <label for="nom" class="text-dark">Tipo de Proyecto*</label>
                <select v-model="addtip" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="tip in tipos" v-bind:value="tip.id_tipoproyecto">@{{ tip.nombre_proyecto }}</option>
                </select>
                <label for="nom" class="text-dark">Colonia*</label>
                <select v-model="addcol" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="colonia in colonias" v-bind:value="colonia.id_colonia">@{{ colonia.nombre_colonia }}</option>
                </select>
                <label for="nom" class="text-dark">Fecha*</label>
                <input id="fecha_registro" type="text" class="form-control text-dark pickadate" v-model="addfec">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal" >Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addProyecto" data-dismiss="modal" >Agregar</button>
            </div>
        </div>
    </div>
</div>
