<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-map-pin"></i> <?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('wilayah/edit/'); ?><?= $wilayah['id_wilayah']; ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_wilayah" id="id_wilayah" value="<?= $wilayah['id_wilayah']; ?>" />
                <div class="form-group">
                    <label for="nama_wilayah"><strong>Nama Wilayah</strong></label>
                    <input type="text" name="nama_wilayah" id="nama_wilayah" placeholder="Contoh : Mejayan" class="form-control" value="<?= $wilayah['nama_wilayah'] ?>">
                    <?= form_error('nama_wilayah', '<small class="text-danger">', '</small>'); ?>
                </div>
                <hr>
                <button type=" submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                <a href="<?php echo base_url() . 'wilayah' ?>" class="btn btn-secondary"><i class="fa fa-reply"></i>&nbsp;Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>

</html>