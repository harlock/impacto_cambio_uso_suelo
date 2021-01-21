<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light border">
                <h5 class="modal-title text-dark text-uppercase text-bold-700" id="exampleModalCenterTitle">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="nom" class="text-dark float-left">Nombre*</label>
                <input id="nom" type="text" class="form-control text-dark text-capitalize" v-model="addname">
                <label for="nom" class="text-dark float-left">Primer Apellido*</label>
                <input id="nom" type="text" class="form-control text-dark text-capitalize" v-model="addap">
                <label for="nom" class="text-dark float-left">Segundo Apellido*</label>
                <input id="nom" type="text" class="form-control text-dark text-capitalize" v-model="addam">
                <label for="nom" class="text-dark float-left">Email*</label>
                <input id="nom" type="email" class="form-control text-dark" v-model="addemail">
                <label for="nom" class="text-dark float-left">Contraseña*</label>
                <input id="nom" type="password" class="form-control text-dark" v-model="addpass">
                <label for="nom" class="text-dark float-left">Tipo de Usuario*</label>
                <select v-model="addtip" class="form-control">
                    <option value="" disabled>Selecione uno</option>
                    <option v-for="tipu in tipouser" v-bind:value="tipu.id_tipo">@{{ tipu.descripcion}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-success" @click="addUsers" data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
