<?= $this->extend('layout/menu'); ?>
<?= $this->section('title'); ?>
<h3>Manajemen Data Files</h3>
<?= $this->endSection(); ?>
<?= $this->section('isi'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">
        DATA <?=strtoupper($tipe)?>
            <!-- <button type="button" class="btn btn-primary tombolTambahKategori">
                <i class="fa fa-plus"></i> Tambah Data
            </button> -->
        </h3>
    </div>
    <div class="card-body">
        <div class="card-body">
           <div class="input-group mb-3">
                <input type="text" class="form-control carifiles" placeholder="Cari Kode/Nama Skin" name="carifiles" onchange="carifile(value)" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-primary" name="tombolcarifiles" type="submit" id="button-addon2" onclick("carifile(value)")><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="table-responsive">
                <div class="table">
                    <table class="table table-sm table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Size</th>
                            <th>Detail</th>
                            <th>Aksi</th>
    
    
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            $count=1;
                            foreach ($files as $row) :
                            ?>
                                <tr>
                                    <td><?=  $count ?></td>
                                    <td><?= $row['title']; ?></td>
                                    <td><?= $row['size'] ?></td>
                                    <td><button type="button" class="btn btn-sm btn-success" onclick="detail('<?= $row['id'] ?>')">Detail</button></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $row['id'] ?>','<?= $row['title'] ?>')">
                                            <i class="fa fa-trash-alt"></i></button>
    
                                        <button type="button" class="btn btn-warning btn-sm" onclick="edit('<?= $row['id'] ?>')">
                                            <i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                                
                            <?php $count++;?> 
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-center">
            <?= $pager->links('files', 'paging'); ?>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;">
</div>
<div class="viewmodaldetail" style="display: none;">
</div>
<script>
    $(document).ready(function(){
        $( ".carifiles" ).autocomplete({
            maxShowItems: 5,
            source: function(request, response) {
            $.ajax({
                url: "<?php echo site_url('functions/autocomplete/?');?>",
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);
                }
            });
            },
            select: function (event, ui) {
                carifile(ui.item.value);
            }
    }); 
    });
    function carifile(val){
        $.ajax({
            type: "post",
                        url: "<?= site_url('files/cari') ?>",
                        data: {
                            kode: val
                        },
                        dataType: "json",
                        beforeSend:function(){
                            $('.table').html('<i class="fa fa-spin fa-spinner" aria-hidden="true"></i>');
                            $('.pagination').html('');
                        },
                        success: function(response) {
                                $('.table').html(response.view);
                        },
                        error: function(xhr, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
        })
    }
    function detail(id) {
        $.ajax({
            url: "<?= site_url('files/detail') ?>",
            dataType: "json",
            type: "post",
            data: {
                kode: id
            },
            success: function(response) {
                if (response.data) {
                    $('.viewmodaldetail').html(response.data).show();
                    $('#modaldetail').on('shown.bs.modal', function(event) {
                        $('#userid').focus();
                    });
                    $('#modaldetail').modal('show');
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

        function hapus(id, nama) {
            Swal.fire({
                title: 'Hapus <?=$type?>',
                html: "Intro <strong>" + nama + "</strong> dengan ID <strong>" + id + "</strong> akan dihapus!",
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
                        url: "<?= site_url('files/hapus') ?>",
                        data: {
                            idfiles: id
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
            url: "<?= site_url('files/modal') ?>",
            dataType: "json",
            type: "post",
            data: {
                id:id,
                aksi: 0,
                fungsi :'tambah'
            },
            success: function(response) {
                if (response.data) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaleditfiles').on('shown.bs.modal', function(event) {
                        $('#namakategori').focus();
                    });
                    $('#modaleditfiles').modal('show');
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });

    }
</script>
<?= $this->endSection(); ?>