<!-- Modal -->
<div class="modal fade" id="modaltambahkategori" tabindex="-1" aria-labelledby="modaltambahkategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahkategoriLabel">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('categories/tambah', ['class' => 'formsimpan']) ?>
            <input type="hidden" name="aksi" id="aksi" value="<?= $aksi ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="namakategori">Nama kategori</label>
                    <input type="text" name="namakategori" id="namakategori" class="form-control form-control-sm" required>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="imgkategori">Gambar</label>
                    <input class="form-control form-control-sm" id="imgkategori" name="imgkategori" type="file" accept="image/png, image/gif, image/jpeg, image/webp, image/jpg" required/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="sumbit" class="btn btn-primary tombolSimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            let formq = $('.formsimpan')[0];
            let data = new FormData(formq);
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: data,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(e) {
                    $('.tombolSimpan').prop('disabled', true);
                    $('.tombolSimpan').html('<i class="fa fa-spin fa-spinner"></i>')
                },
                success: function(response) {
                    let aksi = $('#aksi').val();

                    if (response.sukses) {
                        if (aksi == 0) {
                            Swal.fire(
                                'Sukses',
                                response.sukses,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();

                                }
                            });
                        } else {
                            $('#modaltambahkategori').modal('hide');
                            tampilkategori();
                        }
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
            return false
        });
    });
</script>