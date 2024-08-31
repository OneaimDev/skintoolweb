<div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="modaldetailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pesanan</h5>
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
                            <div class="col">Nama </div>
                            <div class="col Nama ">
                            <?=$row['title']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Size</div>
                            <div class="col Namafile ">
                            <?=$row['size']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Thumbnail</div>
                            <div class="col gofileid" style="font-size:12px">
                            <?=$row['thumbnail']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Link</div>
                            <div class="col gofileid" style="font-size:12px">
                            <?=$row['link']?>
                            </div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Link Manual</div>
                            <div class="col linkdownload "style="font-size:12px">
                                <?=$row['linkmanual']?></div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Nama File</div>
                            <div class="col linkdirectdownload "style="font-size:12px">
                                <?=$row['namafile']?></div>
                        </div>
                        <div class="row border-bottom border-dark pt-2">
                            <div class="col">Hapus File</div>
                            <div class="col ukuran">
                            <?=$row['hapusfile']?>
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