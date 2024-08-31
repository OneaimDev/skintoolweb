<?= $this->extend('layout/menu'); ?>
<?= $this->section('title'); ?>
<?= $this->endSection(); ?>
<?= $this->section('isi'); ?>

<div class="card">
    <div class="card-header">
            <h3 class="card-title">
                Upload Skin Baru
            </h3>
    </div>
        <div class="card-body">
            <?= form_open('upload/simpandata', ['class' => 'formsimpan','id'=>'frmsimpan','enctype'=>'multipart/form-data']) ?>
                    <div class="form-group">
                        <label for="item_cat">Pilih Kategori</label>
                        <select class="form-control" id="item_cat" name="item_cat" required>
                            <option value="" selected>-Pilih-</option>
                            <?php
                            // Sort the $item array by categories_name
                            usort($item, function($a, $b) {
                                return strcmp($a['categories_name'], $b['categories_name']);
                            });
                    
                            foreach ($item as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['categories_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaskin">Nama Skin</label>
                        <textarea class="form-control" id="namaskin" name="namaskin" placeholder="Masukkan Nama Skin" rows="1"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="sizefile">Size File</label>
                                <input type="text" class="form-control" id="sizefile" name="sizefile" placeholder="Masukkan size file. Contoh 500kb atau 10mb">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="namafile">Nama File</label>
                                <input type="text" class="form-control" id="namafile" name="namafile" placeholder="Masukkan nama file. Contoh Irithel.zip">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="link">Direct Link File</label>
                        <textarea class="form-control" id="link" name="link" placeholder="Masukkan Link Gofile" rows="1"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="linkmanual">Link Manual File</label>
                        <textarea class="form-control" id="linkmanual" name="linkmanual" placeholder="Masukkan Link Mediafire" rows="1"></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="youtube">Link Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="https://www.youtube.com/watch?v=zib_WfGGXCc">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="hapusfile">Hapus File (Nama file original hero)</label>
                                <input type="text" class="form-control" id="hapusfile" name="hapusfile" value="tidak">
                            </div>
                        </div>
                    </div>
                    <hr class="hr"/>
                    Pilih Cara Upload Gambar
                    <hr class="hr"/>
                    <button type="button" class="btn btn-primary btn-sm" onclick="pilihlink()">
                        Link
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="pilihupload()">
                        Upload
                    </button>
                    <div id="gbr" class="form-group">
                    </div>
        
                    <button type="sumbit" class="btn btn-primary tombolSimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" id="reset">Reset</button>
            </div>
            <?= form_close(); ?>
        </div>
    
<script>
let index = 1;
document.getElementById('reset').addEventListener('click', clearData);

function pilihlink(){
    const element = document.getElementById("gbr");
    element.outerHTML = '<div id="gbr" class="form-group pt-2"><div class="form-group"><label for="linkgambar">Link Gambar</label><textarea class="form-control" id="linkgambar" name="linkgambar" placeholder="Masukkan Link Gambar" rows="1"></textarea><input   type="hidden"  name="pilihan" id="pilihan" value="link"></div></div>';
}
function pilihupload(){
    const element = document.getElementById("gbr");
    element.outerHTML = '<div id="gbr" class="form-group pt-2"><div class="form-group"><label for="imgkategori">Gambar</label><input class="form-control form-control-lg" id="linkgambar" name="linkgambar" type="file" accept="image/png, image/gif, image/jpeg, image/webp, image/jpg" required/><input name="pilihan" id="pilihan"  type="hidden" value="gambar"></div></div>';
}
function clearData() {
    document.getElementById('item_cat').value = '';
    document.getElementById('namaskin').value = '';
    document.getElementById('sizefile').value = '';
    document.getElementById('namafile').value = '';
    document.getElementById('link').value = '';
    document.getElementById('linkgambar').value = '';
    console.log('ok');
}

$(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            var formData = new FormData(this);
            e.preventDefault();
            $.ajax({
                url:"<?=base_url('upload/simpandata')?>",
                dataType:'json',
                type:'post',
                data: formData,
                processData: false,
                contentType: false,
                success:function(response){
                    if(response.sukses){
                        Swal.fire({
                            title: 'Upload File Lainnya',
                            icon:'question',
                            showDenyButton: true,
                            confirmButtonText: 'Ya ',
                            denyButtonText: `Tidak`,
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                clearData();
                            } else if (result.isDenied) {
                                window.location.href = "<?=base_url('upload')?>";
                            }
                        });
                    }
                }
            });
        });
    });

</script>
<?= $this->endSection(); ?>