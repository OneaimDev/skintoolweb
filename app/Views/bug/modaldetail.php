<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="modaldetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Bug</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="container">
            <?php $nomor = 1;
                foreach ($data as $row) :
            ?>

                    <div class="col=lg-6">
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">ID</div>
                            <div class="col Id ">
                            <?=$row['id']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Nama Skin</div>
                            <div class="col namaskin">
                            <?=$row['namaskin']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Keterangan</div>
                            <div class="col keterangan" style="font-size:12px">
                            <?=$row['keterangan']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Tanggal</div>
                            <div class="col reporttime">
                            <?=$row['report_time']?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>

</script>