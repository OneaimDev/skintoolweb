<!-- Modal -->
<div class="modal fade" id="modaltambahkategori" tabindex="-1" aria-labelledby="modaltambahkategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahkategoriLabel">Tambah Data Corusel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('corusel/tambah', ['class' => 'formsimpan','id'=>'frmsimpan','enctype'=>'multipart/form-data']) ?>
            <input type="hidden" name="aksi" id="aksi" value="0">
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaitem">Tipe Corusel (Isi link atau Id Files)</label>
                    <input type="text" name="namaitem" id="namaitem" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <label for="img">Gambar</label>
                    <input class="form-control" id="img" name="img" type="file" accept="image/png, image/gif, image/jpeg, , image/webp" required/>
                </div>
            </div>

            <div class="modal-footer">
                <button type="sumbit" class="btn btn-primary tombolSimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            var formData = new FormData(this);
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                dataType :'json',
                contentType: false,
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
                        }
                    }else if (response.gagal) {
                        if (aksi == 0) {
                            Swal.fire(
                                'Gagal',
                                response.cek,
                                'error'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                        document.getElementById("img").value = "";
                                        $('.tombolSimpan').prop('disabled', false);
                                        $('.tombolSimpan').html('Simpan')
                                }
                            });
                        } else {
                            $('#modaltambahkategori').modal('hide');
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