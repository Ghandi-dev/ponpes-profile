<div id="data_siswa">
    <div class="row g-3">
        <div class="col-md-4">
            <label for="nama" class="form-label">Nama<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?=$siswa->nama?>" required>
        </div>
        <div class="col-md-4">
            <label for="nisn" class="form-label">NISN<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nisn" name="nisn" value="<?=$siswa->nisn?>" required>
        </div>
        <div class="col-md-4">
            <label for="nik" class="form-label">NIK<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nik" name="nik" value="<?=$siswa->nik?>" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="no_kk" class="form-label">No Kartu Keluarga<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?=$siswa->no_kk?>" required>
        </div>
        <div class="col-md-4">
            <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                value="<?=$siswa->tempat_lahir?>" required>
        </div>
        <div class="col-md-4">
            <label for="tanggal_lahir" class="form-label">Tanggal
                Lahir<span class="text-danger">(*)</span></label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                value="<?=$siswa->tanggal_lahir?>" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label class="form-label">Jenis Kelamin<span class="text-danger">(*)</span></label>
            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                <option disabled <?=empty($siswa->jenis_kelamin) ? 'selected' : ''?>>Pilih
                    Jenis Kelamin</option>
                <option value="L" <?=$siswa->jenis_kelamin === 'L' ? 'selected' : ''?>>Laki
                    - Laki</option>
                <option value="P" <?=$siswa->jenis_kelamin === 'P' ? 'selected' : ''?>>
                    Perempuan</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="asal_sekolah" class="form-label">Asal Sekolah<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah"
                value="<?=$siswa->asal_sekolah?>" required>
        </div>
        <div class="col-md-4">
            <label for="no_hp" class="form-label">No Telepon<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=$siswa->no_hp?>" required>
        </div>
    </div>
</div>