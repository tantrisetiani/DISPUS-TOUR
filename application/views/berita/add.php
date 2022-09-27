<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="far fa-user"></i> <?= $title; ?></h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmAddBerita', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="judul" name="judul" value=" <?= set_value('judul'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('judul') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="link" class="col-sm-2 col-form-label">link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="link" name="link" value=" <?= set_value('link'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('link') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= set_value('deskripsi'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('deskripsi') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" href="<?php echo site_url('berita/index'); ?>" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>