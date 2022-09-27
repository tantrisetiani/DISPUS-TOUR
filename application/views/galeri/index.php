        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-mountain"></i> <?= $title; ?></h1>

            <!-- notification/alert -->
            <?= form_error('image', '<div class="error">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>

                <div class="card-body">
                    <a href="<?= base_url('galeri/tambah'); ?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text">&nbsp;Tambah Data Foto Galeri</span>
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center" style="font-weight: bold;">
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($galeri as $galeri) : ?>
                                    <tr class="text-center">
                                        <td><?= $i++; ?></td>
                                        <td>
                                            <img src="<?php echo base_url(); ?>assets/img/galeri/<?= $galeri['foto_galeri']; ?>" width="100" height="100">
                                        </td>
                                        <td><?= $galeri['keterangan_galeri']; ?></td>
                                        <td>
                                            <a href="<?= base_url('galeri/edit/'); ?><?= $galeri['id_galeri']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteConfirm('<?= base_url('galeri/hapus/' . $galeri['id_galeri']) ?>')" href="#!" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus Data Foto Galeri?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function deleteConfirm(url) {
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>