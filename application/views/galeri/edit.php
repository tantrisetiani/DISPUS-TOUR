        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="fas fa-picture"></i> <?= $title; ?></h1>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <form action="<?php base_url('galeri/edit/'); ?><?= $galeri['id_galeri']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_galeri" id="id_galeri" value="<?php echo $galeri['id_galeri']; ?>" />
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/galeri/'); ?><?= $galeri['foto_galeri']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="file"><strong>Plih Gambar (maksimal ukuran gambar 2Mb)</strong></label>
                                <div class="custom-file">
                                    <input type="file" name="foto_galeri" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan_galeri"><strong>Keterangan Foto Galeri</strong></label>
                            <input type="text" value="<?php echo $galeri['keterangan_galeri'] ?>" class="form-control" id="keterangan_galeri" name="keterangan_galeri">
                            <?= form_error('keterangan_galeri', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        <a href="<?php echo base_url() . 'galeri' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i>&nbsp;Kembali</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- panggil jquery -->
        <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

        <!-- panggil ckeditor.js -->
        <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- panggil adapter jquery ckeditor -->
        <script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>

        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        </script>
        <!-- Protect jika ada yang upload ukuran foto terlalu besar -->
        <script type="text/javascript">
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if (this.files[0].size > 2000000) {
                    alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 2 Mb");
                    this.value = "";
                };
            };
        </script>