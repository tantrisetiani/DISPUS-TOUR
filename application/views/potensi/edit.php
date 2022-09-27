        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i> <?= $title; ?></h1>
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">

                    <form action="<?php base_url('potensi/edit/'); ?><?= $potensi['id_potensi']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_potensi" id="id_potensi" value="<?= $potensi['id_potensi']; ?>" />
                        <div class="form-group">
                            <label for="nama_potensi">Nama Potensi</label>
                            <input type="text" class="form-control" id="nama_potensi" name="nama_potensi" value="<?php echo $potensi['nama_potensi']; ?>">
                            <?= form_error('nama_potensi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori Potensi</label>
                            <select class="form-control" name="id_kategori" required>
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($kategori->result() as $ktgri) : ?>
                                    <option <?= ($ktgri->id_kategori == $potensi->id_kategori ? 'selected=""' : '') ?> value="<?= $ktgri->id_kategori; ?>"><?= $ktgri->jenis_kategori; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="wilayah_potensi">Wilayah Potensi</label>
                            <select class="form-control" name="id_wilayah">
                                <option value="">--Pilih Wilayah--</option>
                                <?php foreach ($wilayah as $wil) : ?>
                                    <option <?= ($wil['id_wilayah'] == $potensi['id_wilayah'] ? 'selected=""' : '') ?> value="<?= $wil['id_wilayah']; ?>"><?= $wil['nama_wilayah']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="video_potensi">Video Potensi</label>
                            <input type="text" class="form-control" id="wilayah_potensi" name="video_potensi" value="<?php echo $potensi['video_potensi']; ?>">
                            <?= form_error('video_potensi', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <label>Tentang Potensi</label>
                                </div>
                                <div class="panel-body">
                                    <textarea class="ckeditor" id="editor-custom" name="tentang_potensi"><?php echo $potensi['tentang_potensi'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <label><strong>Sejarah Potensi</strong></label>
                                </div>
                                <div class="panel-body">
                                    <textarea class="ckeditor" id="editor-custom" name="sejarah_potensi"><?php echo $potensi['sejarah_potensi'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <img src="<?= base_url('assets/img/potensi/'); ?><?= $potensi['foto_potensi']; ?>" class="img-thumbnail" width="200px"><br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="file">Plih Foto Potensi (maksimal ukuran gambar 2Mb)</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_potensi" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                        <a href="<?php echo base_url() . 'potensi' ?>" class="btn btn-secondary"><i class="fas fa-reply"></i>&nbsp;Kembali</a>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- memanggil jquery -->
        <script src="<?= base_url('assets/ckeditor/jquery/jquery-3.1.1.min.js'); ?>"></script>

        <!-- memanggil ckeditor.js -->
        <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- memanggil adapter jquery ckeditor -->
        <script src="<?= base_url('assets/ckeditor/adapters/jquery.js'); ?>"></script>

        <!-- setup selector -->
        <script>
            $('textarea.texteditor').ckeditor();
        </script>

        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        </script>

        <script type="text/javascript">
            var uploadField = document.getElementById("file");
            uploadField.onchange = function() {
                if (this.files[0].size > 2000000) { // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
                    alert("Maaf. Ukuran Foto Terlalu Besar ! Maksimal 2 Mb");
                    this.value = "";
                };
            };
        </script>

        <script>
            var resizefunc = [];
        </script>
        <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('editor-custom', {
                uiColor: '#537fbb'
            });
        </script>