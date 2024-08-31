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