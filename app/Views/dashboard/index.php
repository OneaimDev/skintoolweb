<?= $this->extend('layout/menu'); ?>
<?= $this->section('isi'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Beranda</h1>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="bug">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Bug Belum Diperbaiki</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_bug?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-tools fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        if (<?= $jml_bug?> > 0) {
            Swal.fire({
                toast:true,
                icon: 'warning',
                position:'top-end',
                confirmButtonText:'cek',
                timer:3000,
                timerProgressBar: true,
                title: '<?= $jml_bug?> Bug Dilaporkan Belum Diperbaiki'
                }).then((result)=>{
                    if(result.isConfirmed){
                        window.location.href = "https://skintoolweb.oneaimdeveloper.com/bug";
                    }
            })
        }        

    });
</script>
<?= $this->endSection(); ?>