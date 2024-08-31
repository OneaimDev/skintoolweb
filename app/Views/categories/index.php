<?= $this->extend('layout/menu'); ?>
<?= $this->section('title'); ?>
<h3>Manajemen Data Kategori</h3>
<?= $this->endSection(); ?>
<?= $this->section('isi'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <button type="button" class="btn btn-primary tombolTambahKategori">
                <i class="fa fa-plus"></i> Tambah Data
            </button>
        </h3>
    </div>
    <div class="card-body">
        <div class="card-body">
            <?= form_open('kategori/index') ?>
            <?= csrf_field(); ?>
            <!-- <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Kode/Nama kategori" name="carikategori" value="<?= session()->get('carikategori') ?>" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-primary" name="tombolcarikategori" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div> -->
            <?= form_close(); ?>
            <div class="table-responsive">
                <div class="table">
                    <table class="table table-sm table-striped">
                        <thead>
                            <th>Nomor</th>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Link Gambar</th>
                            <th>Aksi</th>


                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($categories as $row) :
                            ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['categories_name'] ?></td>
                                    <td><?= $row['thumb'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusKat('<?= $row['id'] ?>','<?= $row['categories_name'] ?>')">
                                            <i class="fa fa-trash-alt"></i></button>

                                        <button type="button" class="btn btn-warning btn-sm" onclick="edit('<?=$row['id'] ?>')">
                                            <i class="fa fa-edit"></i></button> 
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-center">
            <?= $pager->links('categories', 'paging'); ?>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;">
</div>
<script>
    function hapusKat(id, nama) {
        Swal.fire({
            title: 'Hapus Kategori',
            html: "Kategori <strong>" + nama + "</strong> dengan ID <strong>" + id + "</strong> akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya Hapus!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('categories/hapus') ?>",
                    data: {
                        idKategori: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'berhasil',
                                text: response.sukses,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }

                    },
                    error: function(xhr, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        });
    }
    function edit(id){
        $.ajax({
                url: "<?= site_url('categories/modal') ?>",
                dataType: "json",
                type: "post",
                data: {
                    aksi: 0,
                    fungsi :'edit',
                    id:id
                },
                success: function(response) {
                    if (response.data) {
                        $('.viewmodal').html(response.data).show();
                        $('#modaleditkategori').on('shown.bs.modal', function(event) {
                            $('#namakategori').focus();
                        });
                        $('#modaleditkategori').modal('show');
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
    }
    $(document).ready(function() {
        $('.tombolTambahKategori').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= site_url('categories/modal') ?>",
                dataType: "json",
                type: "post",
                data: {
                    aksi: 0,
                    fungsi :'tambah'
                },
                success: function(response) {
                    if (response.data) {
                        $('.viewmodal').html(response.data).show();
                        $('#modaltambahkategori').on('shown.bs.modal', function(event) {
                            $('#namakategori').focus();
                        });
                        $('#modaltambahkategori').modal('show');
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });


        });
    });
</script>
<?= $this->endSection(); ?>