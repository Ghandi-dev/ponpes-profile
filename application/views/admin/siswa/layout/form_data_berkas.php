<div id="data_berkas">
    <div class="row g-3">
        <div class="col-md-4 d-flex flex-column align-items-center">
            <img id="preview_image_kartu_keluarga"
                src="<?=!empty($berkas->kartu_keluarga) ? base_url('assets/upload/berkas/') . $berkas->kartu_keluarga : base_url() . 'assets/admin/img/no-image.jpg'?>"
                class="img-fluid border" style="width: 100%; aspect-ratio: 1/1; object-fit: cover;" alt="Preview Image">
            <div class="w-100 mt-3">
                <label for="kartu_keluarga" class="form-label">Kartu Keluarga<span
                        class="text-danger">(*)</span></label>
                <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga"
                    value="<?=!empty($berkas->kartu_keluarga) ? $berkas->kartu_keluarga : ''?>">
                <input type="hidden" class="form-control" id="old_kartu_keluarga" name="old_kartu_keluarga"
                    value="<?=$berkas->kartu_keluarga ?? ''?>">
            </div>
        </div>
        <div class=" col-md-4">
            <img id="preview_image_akta_kelahiran"
                src="<?=!empty($berkas->akta_kelahiran) ? base_url('assets/upload/berkas/') . $berkas->akta_kelahiran : base_url() . 'assets/admin/img/no-image.jpg'?>"
                class="img-fluid border" style="width: 100%; aspect-ratio: 1/1; object-fit: cover;" alt="Preview Image">
            <div class="w-100 mt-3">
                <label for="akta_kelahiran" class="form-label">Akta Kelahiran<span
                        class="text-danger">(*)</span></label>
                <input type="file" class="form-control" id="akta_kelahiran" name="akta_kelahiran"
                    value="<?=!empty($berkas->akta_kelahiran) ? $berkas->akta_kelahiran : ''?>">
                <input type="hidden" class="form-control" id="old_akta_kelahiran" name="old_akta_kelahiran"
                    value="<?=$berkas->akta_kelahiran ?? ''?>">
            </div>
        </div>
        <div class="col-md-4">
            <img id="preview_image_ijazah"
                src="<?=!empty($berkas->ijazah) ? base_url('assets/upload/berkas/') . $berkas->ijazah : base_url() . 'assets/admin/img/no-image.jpg'?>"
                class="img-fluid border" style="width: 100%; aspect-ratio: 1/1; object-fit: cover;" alt="Preview Image">
            <div class="w-100 mt-3">
                <label for="ijazah" class="form-label">Ijazah<span class="text-danger">(*)</span></label>
                <input type="file" class="form-control" id="ijazah" name="ijazah"
                    value="<?=!empty($berkas->ijazah) ? $berkas->ijazah : ''?>">
                <input type="hidden" class="form-control" id="old_ijazah" name="old_ijazah"
                    value="<?=$berkas->ijazah ?? ''?>">
            </div>
        </div>
    </div>
</div>