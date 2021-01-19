<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalCenterTitle">Esta seguro que desea eliminar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-icon btn-outline-dark" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-icon btn-outline-danger"  data-dismiss="modal" @click="delPosts">Eliminar</button>
            </div>
        </div>
    </div>
</div>
