<?= $this->extend('layout/menu'); ?>
<?= $this->section('title'); ?>
<h3>Manajemen Data Laporan Bug</h3>
<?= $this->endSection(); ?>
<?= $this->section('isi'); ?>
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
        <div class="card-body">
            <?= form_open('bug/index') ?>
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
                            <th>Nama Skin</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Detail</th>
                            <th>Perbaikan</th> 
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($categories as $row) :
                            ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $row['namaskin'] ?></td>
                                    <td><?= $row['keterangan'] ?></td>
                                    <td><?= $row['report_time'] ?></td>
                                    <td><button type="button" class="btn btn-sm btn-success" onclick="detail('<?= $row['id'] ?>')">Detail</button></td>
                                    <td><?php if($row['is_done'] == "true"){
                                    ?>
                                    <?=('Done');?>
                                    <?php }
                                    else{
                                    ?>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="fix('<?= $row['id'] ?>')">Fix Bug</button>
                                    <?php } ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-center">
            <?= $pager->links('bug', 'paging'); ?>
            </div>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;">
</div>
<div class="viewmodaldetail" style="display: none;">
</div>
<script>
    function detail(id) {
        $.ajax({
            url: "<?= site_url('bug/detail') ?>",
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
    function fix(id) {
            $.ajax({
            url:"<?=base_url('bug/fix')?>",
            dataType:'json',
            type:'post',
            data: {
                id:id
            },
            success:function(response){
                if(response.sukses){
                    Swal.fire({
                        title: 'Sukses',
                        icon:'success',
                        showDenyButton: false,
                        confirmButtonText: 'Reload',
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location.href = "<?=base_url('bug')?>";
                        }
                    });
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>