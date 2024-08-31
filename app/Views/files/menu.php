<?= $this->extend('layout/menu'); ?>
<?= $this->section('isi'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manajemen Data Files </h1>
    <div class="row">
        <ul>
        <?php 
        // Sort the categories array by name
        usort($categories, function($a, $b) {
            return strcmp($a['categories_name'], $b['categories_name']);
        });
        foreach ($categories as $row) :
        ?>
        <li><a href="<?=base_url('files?categories='.$row['id'])?>"><?=$row['categories_name']?></a></li>
        <?php endforeach ?>
        </ul>
    </div>
</div>

<?= $this->endSection(); ?>