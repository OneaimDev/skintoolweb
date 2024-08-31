<!-- Modal -->
<div class="modal fade" id="modaleditfiles" tabindex="-1" aria-labelledby="modaleditfilesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditfilesLabel">Tambah Data Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open(base_url('files/edit'), ['class' => 'formsimpan','id'=>'frmsimpan','enctype'=>'multipart/form-data']) ?>
                <input type="hidden" name="aksi" id="aksi" value="0">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    <div class="form-group">
                        <label for="nama">Nama Skin</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" value=
                        "<?=$data['title']?>"required>
                    </div>
                    <div class="form-group">
                        <label for="file">Nama File</label>
                        <input type="text" name="file" id="file" class="form-control form-control-sm" value=
                        "<?=$data['namafile']?>"required>
                    </div>
                    <div class="form-group">
                        <label for="categories">Kategori</label>
                        <select class="form-control" id="categories" name="categories" required>
                        <option value="" selected>-Pilih-</option>
                        <?php foreach ($categories as $row) :
                            ?>
                            <option value='<?=$row['id']?>' <?php if($data['cat_name_id'] == $row['id']){echo('selected');}?>><?=$row['categories_name']?></option>
                           <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran Skin</label>
                        <input type="text" name="ukuran" id="ukuran" class="form-control form-control-sm" value=
                        "<?=$data['size']?>"required>
                    </div>
                    <div class="form-group">
                        <label for="linkgambar">Link Gambar</label>
                        <input type="text" name="linkgambar" id="linkgambar" class="form-control form-control-sm" value=
                        "<?=$data['thumbnail']?>"required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link Skin</label>
                        <input type="text" name="link" id="link" class="form-control form-control-sm" value=
                        "<?=$data['link']?>"required>
                    </div>
                    <div class="form-group">
                        <label for="alt">Link Alternatif</label>
                        <input type="text" name="alt" id="alt" class="form-control form-control-sm" value=
                        "<?=$data['linkmanual']?>"required>
                    </div>
                    <div class="form-group">
                        <label for="yt">Link Youtube</label>
                        <input type="text" name="yt" id="yt" class="form-control form-control-sm" value=
                        "<?=$data['youtube']?>"required>
                    </div>
                </div>
                <div class="form-group">
                    <label><sup style="color:red;">* </sup>: Kosongkan Jika Tidak Dirubah</label>
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
                            $('#modaleditfiles').modal('hide');
                            tampilkategori();
                        }
                    }else if (response.gagal) {
                        if (aksi == 0) {
                            Swal.fire(
                                'Gagal',
                                response.cek,
                                'error'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                        $('.tombolSimpan').prop('disabled', false);
                                        $('.tombolSimpan').html('Simpan')
                                }
                            });
                        } else {
                            $('#modaleditfiles').modal('hide');
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