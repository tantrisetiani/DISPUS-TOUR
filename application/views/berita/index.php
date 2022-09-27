<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="far fa-user"></i> <?= $title; ?></h1>

    <div mb-2>
        <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
        <?php if ($this->session->flashdata('message')) :
            echo $this->session->flashdata('message');
        endif; ?>
    </div>

    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('admin/add') ?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                <span class="icon text-white-50">
                    <i class="fa fa-plus-circle"></i>
                </span>
                <span class="text">&nbsp;Tambah Data Berita</span>
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center" style="font-weight: bold;">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Link</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_berita as $row) : ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $row->judul ?></td>
                                <td><?= $row->link ?></td>
                                <td><?= $row->deskripsi ?></td>
                                <td>
                                    <a href="<?= site_url('berita/edit/' . $row->idberita) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> </a>
                                    <a href="javascript:void(0);" data="<?= $row->idberita ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal dialog hapus data-->
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>

<script>
    //menampilkan modal dialog saat tombol hapus ditekan
    $('#tableBerita').on('click', '.item-delete', function() {
        //ambil data dari atribute data 
        var id = $(this).attr('data');
        $('#myModalDelete').modal('show');
        //ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete 
        //pada controller Berita
        $('#btdelete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>berita/delete/',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#myModalDelete').modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>