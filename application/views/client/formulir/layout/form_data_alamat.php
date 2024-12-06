<div id="data_alamat">
    <div class="row g-3">
        <div class="col-md-3">
            <label for="alamat" class="form-label">Alamat<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="alamat" name="alamat"
                value="<?=isset($alamat->alamat) ? $alamat->alamat : ''?>" required>
        </div>
        <div class=" col-md-3">
            <label for="kode_pos" class="form-label">Kode Pos<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                value="<?=isset($alamat->kode_pos) ? $alamat->kode_pos : ''?>" required>
        </div>
        <div class="col-md-3">
            <label for="rt" class="form-label">RT<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="rt" name="rt" value="<?=isset($alamat->rt) ? $alamat->rt : ''?>"
                required>
        </div>
        <div class=" col-md-3">
            <label for="rw" class="form-label">RW<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="rw" name="rw" value="<?=isset($alamat->rw) ? $alamat->rw : ''?>"
                required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col-md-3">
            <label for="provinsi" class="form-label">Provinsi<span class="text-danger">(*)</span></label>
            <select class="form-select" id="provinsi" name="provinsi" required>
                <option value="">--Pilih Provinsi--</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="kabupaten" class="form-label">Kabupaten<span class="text-danger">(*)</span></label>
            <select class="form-select" id="kabupaten" name="kabupaten" required disabled>
                <option value="">--Pilih Kabupaten--</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="kecamatan" class="form-label">Kecamatan<span class="text-danger">(*)</span></label>
            <select class="form-select" id="kecamatan" name="kecamatan" required disabled>
                <option value="">--Pilih Kecamatan--</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="desa" class="form-label">Desa<span class="text-danger">(*)</span></label>
            <select class="form-select" id="desa" name="desa" required disabled>
                <option value="">--Pilih Desa--</option>
            </select>
        </div>
    </div>
</div>