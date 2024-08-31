<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OneAim Control Center</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jquery-ui/jquery-ui.css">
<script src="<?= base_url('assets') ?>/plugins/jquery-ui/jquery-ui.js"></script>
<script src="<?= base_url('assets') ?>/plugins/autocomplete-scroll/jquery.ui.autocomplete.scroll.min.js"></script>

    <!-- SweetAlert -->
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/sweetalert2/sweetalert2.min.css">
    <script src="<?= base_url('assets') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
</head>

<body id="page-top" >
    <!-- Page Wrapper -->
    <div id="wrapper" >
        <!-- Sidebar -->
        <?php
            if(isset($_COOKIE['orientation'])){
                if($_COOKIE['orientation'] == 'landscape'){
                   echo($this->renderSection('menu'));
                }else{
                   echo($this->renderSection('menu2'));
                }
            }else{
                echo('ok');
            }
        ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <!-- Sidebar Toggle (Topbar) -->
                <?php 
                    if(isset($_COOKIE['orientation'])){
                        if($_COOKIE['orientation']=='landscape'){
                            echo('                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>');
                        }else{
                            echo('');
                        }
                    }else{
                        echo('');
                    }
                ?>
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" >
                    <h3>OneAim Control Center</h3>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <div class="col-sm-6">
                    <h1> <?= $this->renderSection('title') ?></h1>
                </div>
                <!-- Begin Page Content -->

                    <?= $this->renderSection('isi') ?>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; OneAimDev 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>
    <?php 

    if(isset($_COOKIE["orientation"])){
    ?>
        <script>
            $(document).ready(function(){
                console.log('<?=$_COOKIE["orientation"]?>')
            });
        </script>
    <?php }else{?>

            <script>
                $(document).ready(function(){
                    if(screen.height > screen.width){
                        var orientation = 'portrait';
                    }else{
                        var orientation = 'landscape';
                    }
                    $.ajax({
                      type: "POST",
                      url: "<?=base_url('funcs/orientation')?>",
                      data: {
                          orientation:orientation
                      },
                      dataType: 'json',
                      success: function(){
                            window.location.reload();
                      }
                    });
                });
            </script>
    <?php 
    } ?>
</body>

</html>