<div id="data_ayah">
    <div class="row g-3">
        <div class="col-md-4">
            <label for="nama_ayah" class="form-label">Nama Ayah<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                value="<?=isset($orangtua->nama_ayah) ? $orangtua->nama_ayah : ''?>" required>
        </div>
        <div class=" col-md-4">
            <label for="tempat_lahir_ayah" class="form-label">Tempat Lahir
                Ayah<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah"
                value="<?=isset($orangtua->tempat_lahir_ayah) ? $orangtua->tempat_lahir_ayah : ''?>" required>
        </div>
        <div class="col-md-4">
            <label for="tanggal_lahir_ayah" class="form-label">Tanggal Lahir
                Ayah<span class="text-danger">(*)</span></label>
            <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah"
                value="<?=isset($orangtua->tanggal_lahir_ayah) ? $orangtua->tanggal_lahir_ayah : ''?>" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="pendidikan_ayah" class="form-label">Pendidikan
                Ayah</label>
            <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah"
                value="<?=isset($orangtua->pendidikan_ayah) ? $orangtua->pendidikan_ayah : ''?>">
        </div>
        <div class="col-md-4">
            <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                value="<?=isset($orangtua->pekerjaan_ayah) ? $orangtua->pekerjaan_ayah : ''?>" required>
        </div>
        <div class="col-md-4">
            <label for="penghasilan_ayah" class="form-label">Penghasilan
                Ayah<span class="text-danger">(*)</span></label>
            <select class="form-select" aria-label="Pilih Penghasilan Ayah" name="penghasilan_ayah" required>
                <option disabled <?=empty($orangtua->penghasilan_ayah) ? 'selected' : ''?>>
                    Pilih Penghasilan Ayah</option>
                <option value="P1"
                    <?=isset($orangtua->penghasilan_ayah) && $orangtua->penghasilan_ayah === 'P1' ? 'selected' : ''?>>
                    &lt; 500.000</option>
                <option value="P2"
                    <?=isset($orangtua->penghasilan_ayah) && $orangtua->penghasilan_ayah === 'P2' ? 'selected' : ''?>>
                    500.000 - 999.999</option>
                <option value="P3"
                    <?=isset($orangtua->penghasilan_ayah) && $orangtua->penghasilan_ayah === 'P3' ? 'selected' : ''?>>
                    1.000.000 - 1.999.999</option>
                <option value="P4"
                    <?=isset($orangtua->penghasilan_ayah) && $orangtua->penghasilan_ayah === 'P4' ? 'selected' : ''?>>
                    2.000.000 - 4.999.999</option>
                <option value="P5"
                    <?=isset($orangtua->penghasilan_ayah) && $orangtua->penghasilan_ayah === 'P5' ? 'selected' : ''?>>
                    5.000.000 - 10.000.000</option>
                <option value="P6"
                    <?=isset($orangtua->penghasilan_ayah) && $orangtua->penghasilan_ayah === 'P6' ? 'selected' : ''?>>
                    &gt; 10.000.000</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="no_hp_ayah" class="form-label">No HP Ayah</label>
            <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah"
                value="<?=isset($orangtua->no_hp_ayah) ? $orangtua->no_hp_ayah : ''?>">
        </div>
    </div>
</div>