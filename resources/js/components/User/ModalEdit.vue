<template>
    <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:99999 !important;">
        <div class="modal-dialog modal-large" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Level User</label>
                        <select name="tambah_status_pengurus" class="form-control">
                            <option value="">--- Pilih ---</option>
                            <option value="Ketua">Ketua</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Wakil Bendahara">Wakil Bendahara</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Foto</label>
                        <input type="file" name="tambah_foto_pengurus" class="form-control">
                        <span class="m-form__help">Ukuran Foto Maks 2MB</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ModalEdit'
}
</script>
