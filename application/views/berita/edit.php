<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="far fa-user"></i> <?= $title; ?></h1>


    <div class="form-group row">
        <label for="judul" class="col-sm-2 col-form-label">judul</label>
        <div class="col-sm-10">
            <input type="hidden" class="form-control" id="idberita" name="idberita" value=" <?= $data_berita->idberita; ?>">
            <input type="text" class="form-control" id="judul" name="judul" value=" <?= $data_berita->judul; ?>">
            <small class="text-danger">
                <?php echo form_error('judul') ?>
            </small>
        </div>
    </div>

    <div class="form-group row">
        <label for="link" class="col-sm-2 col-form-label">link</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="link" name="link" value="<?= $data_berita->link; ?>">
            <small class="text-danger">
                <?php echo form_error('link') ?>
            </small>
        </div>
    </div>

    idberita<div class="form-group row">
        <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $data_berita->deskripsi; ?>">
            <small class="text-danger">
                <?php echo form_error('deskripsi') ?>
            </small>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10 offset-md-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
</div>