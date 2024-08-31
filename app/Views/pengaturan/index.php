<?= $this->extend('layout/menu'); ?>
<?= $this->section('title'); ?>
<h3>Sistem Aplikasi Setting</h3>
<?= $this->endSection(); ?>
<?= $this->section('isi'); ?>
<div class="card-header">
    <h3 class="card-title">
        <!--<button type="button" class="btn btn-primary tombolTambahKoin">-->
        <!--    <i class="fa fa-plus"></i> Tambah Data-->
        <!--</button>-->
    </h3>
</div>
<div class="card-body">
    <div class="card-body">

        <!-- <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Kode/koin Koin" name="cariKoin" value="<?= session()->get('cariKoin') ?>" autofocus>
            <div class="input-group-append">
                <button class="btn btn-primary" name="tombolcariKoin" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
            </div>
        </div> -->


      <?= form_open('pengaturan/simpandata', ['class' => 'formsimpan']) ?>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="mainads">Pilih Main Ads</label>
                            <select name="mainads" id="mainads" class="form-control">
                                <option value= "ADMOB" <?php if($sistem[0]['mainads'] == "ADMOB"){echo('selected');}?>>ADMOB</option>
                                <option value= "APPLOVIN-M" <?php if($sistem[0]['mainads'] == "APPLOVIN-M"){echo('selected');}?>>APPLOVIN-M</option>
                                <option value= "IRON" <?php if($sistem[0]['mainads'] == "IRON"){echo('selected');}?>>IRON</option>
                                <option value= "FAN" <?php if($sistem[0]['mainads'] == "FAN"){echo('selected');}?>>FAN</option>
                            </select>
                            <div class="errorgame invalid-feedback" style="display: none;">
                        </div>
                    </div>
                </div>
                <div class="col-md">
                   <div class="form-group">
                        <label for="backupads" >Pilih Backup Ads</label>
                            <select name="backupads" id="backupads" class="form-control">
                                <option value= "ADMOB" <?php if($sistem[0]['backupads'] == "ADMOB"){echo('selected');}?>>ADMOB</option>
                                <option value= "APPLOVIN-M" <?php if($sistem[0]['backupads'] == "APPLOVIN-M"){echo('selected');}?>>APPLOVIN-M</option>
                                <option value= "IRON" <?php if($sistem[0]['backupads'] == "IRON"){echo('selected');}?>>IRON</option>
                                <option value= "FAN" <?php if($sistem[0]['backupads'] == "FAN"){echo('selected');}?>>FAN</option>
                            </select>
                            <div class="errorgame invalid-feedback" style="display: none;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="intermain">ID Iklan Interstital Main</label>
                        <input type="text" class="form-control" id="intermain" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['intermain']?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="interbackup">ID Iklan Interstital Backup</label>
                        <input type="text" class="form-control" id="interbackup" placeholder="Masukkan kode iklan"value="<?=$sistem[0]['interbackup']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="rewardmain">ID Iklan Reward Main</label>
                        <input type="text" class="form-control" id="rewardmain" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['rewardmain']?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="rewardbackup">ID Iklan Reward Backup</label>
                        <input type="text" class="form-control" id="rewardbackup" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['rewardbackup']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="bannermain">ID Iklan Banner Main</label>
                        <input type="text" class="form-control" id="bannermain" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['bannermain']?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="bannerbackup">ID Iklan Banner Backup</label>
                        <input type="text" class="form-control" id="bannerbackup" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['bannerbackup']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="nativemain">ID Iklan Native Main</label>
                        <input type="text" class="form-control" id="nativemain" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['nativemain']?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="nativebackup">ID Iklan Native Backup</label>
                        <input type="text" class="form-control" id="nativebackup" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['nativebackup']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="openmain">ID Iklan Open Main</label>
                        <input type="text" class="form-control" id="openmain" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['openmain']?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="openbackup">ID Iklan Open Backup</label>
                        <input type="text" class="form-control" id="openbackup" placeholder="Masukkan kode iklan" value="<?=$sistem[0]['openbackup']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="protectapp">Protect App<sup>*true(untuk aktif) false(untuk nonaktif)</sup></label>
                        <input type="text" class="form-control" id="protectapp" placeholder="Masukkan true atau false" value="<?=$sistem[0]['protectapp']?>">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="openbackup">Interval Iklan Interstital</label>
                        <input type="text" class="form-control" id="interval" placeholder="Masukkan Interval" value="<?=$sistem[0]['interval']?>">
                    </div>
                </div>
            </div>
            <button type="button" id="submit" class="btn btn-primary">Update Sistem Setting</button>
        <?= form_close() ?>
    </div>
</div>
<script>
    $('#submit').click(function(e) {
        e.preventDefault();
        let mainads=$('#mainads').val();
        let backupads=$('#backupads').val();
        let intermain=$('#intermain').val();
        let interbackup=$('#interbackup').val();
        let rewardmain=$('#rewardmain').val();
        let rewardbackup=$('#rewardbackup').val();
        let bannermain=$('#bannermain').val();
        let bannerbackup=$('#bannerbackup').val();
        let nativemain=$('#nativemain').val();
        let nativebackup=$('#nativebackup').val();
        let openmain=$('#openmain').val();
        let openbackup=$('#openbackup').val();
        let protectapp=$('#protectapp').val();
        let interval=$('#interval').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('pengaturan/simpandata') ?>",
            data: {
                mainads:mainads,
                backupads:backupads,
                intermain:intermain,
                interbackup:interbackup,
                rewardmain:rewardmain,
                rewardbackup:rewardbackup,
                bannermain:bannermain,
                bannerbackup:bannerbackup,
                nativemain:nativemain,
                nativebackup:nativebackup,
                openmain:openmain,
                openbackup:openbackup,
                protectapp:protectapp,
                interval:interval
            },
            dataType: "json",
            cache: false,
            beforeSend: function() {
                $('.tombolsimpan').html('<i class = "fa fa-spinner"></i>');
                $('.tombolsimpan').prop('disabled', true);
            },
            success: function(response) {
                if (response.error) {
                    Swal.fire({
                        icon: 'Warning',
                        title: 'Gagal',
                        html: response.error,
                    }).then((result) => {
                        if (result.isConfirmed) {
                           window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: response.sukses,
                    }).then((result) => {
                        if (result.isConfirmed) {
                           window.location.reload();
                        }
                    });
                }
            }
        });
    });
</script>
<?= $this->endSection(); ?>