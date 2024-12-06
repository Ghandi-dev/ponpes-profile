<div id="data_ibu">
    <div class="row g-3 ">
        <div class="col-md-4">
            <label for="nama_ibu" class="form-label">Nama Ibu<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                value="<?=isset($orangtua->nama_ibu) ? $orangtua->nama_ibu : ''?>" required>
        </div>
        <div class=" col-md-4">
            <label for="tempat_lahir_ibu" class="form-label">Tempat Lahir
                Ibu<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu"
                value="<?=isset($orangtua->tempat_lahir_ibu) ? $orangtua->tempat_lahir_ibu : ''?>" required>
        </div>
        <div class="col-md-4">
            <label for="tanggal_lahir_ibu" class="form-label">Tanggal Lahir
                Ibu<span class="text-danger">(*)</span></label>
            <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu"
                value="<?=isset($orangtua->tanggal_lahir_ibu) ? $orangtua->tanggal_lahir_ibu : ''?>" required>
        </div>
    </div>
    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <label for="pendidikan_ibu" class="form-label">Pendidikan
                Ibu</label>
            <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu"
                value="<?=isset($orangtua->pendidikan_ibu) ? $orangtua->pendidikan_ibu : ''?>">
        </div>
        <div class="col-md-4">
            <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                value="<?=isset($orangtua->pekerjaan_ibu) ? $orangtua->pekerjaan_ibu : ''?>" required>
        </div>
        <div class="col-md-4">
            <label for="penghasilan_ibu" class="form-label">Penghasilan
                Ibu<span class="text-danger">(*)</span></label>
            <select class="form-select" aria-label="Pilih Penghasilan Ibu" name="penghasilan_ibu" required>
                <option disabled <?=empty($orangtua->penghasilan_ibu) ? 'selected' : ''?>>
                    Pilih Penghasilan Ibu</option>
                <option value="P1"
                    <?=isset($orangtua->penghasilan_ibu) && $orangtua->penghasilan_ibu === 'P1' ? 'selected' : ''?>>
                    &lt; 500.000</option>
                <option value="P2"
                    <?=isset($orangtua->penghasilan_ibu) && $orangtua->penghasilan_ibu === 'P2' ? 'selected' : ''?>>
                    500.000 - 999.999</option>
                <option value="P3"
                    <?=isset($orangtua->penghasilan_ibu) && $orangtua->penghasilan_ibu === 'P3' ? 'selected' : ''?>>
                    1.000.000 - 1.999.999</option>
                <option value="P4"
                    <?=isset($orangtua->penghasilan_ibu) && $orangtua->penghasilan_ibu === 'P4' ? 'selected' : ''?>>
                    2.000.000 - 4.999.999</option>
                <option value="P5"
                    <?=isset($orangtua->penghasilan_ibu) && $orangtua->penghasilan_ibu === 'P5' ? 'selected' : ''?>>
                    5.000.000 - 10.000.000</option>
                <option value="P6"
                    <?=isset($orangtua->penghasilan_ibu) && $orangtua->penghasilan_ibu === 'P6' ? 'selected' : ''?>>
                    &gt; 10.000.000</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="no_hp_ibu" class="form-label">No HP Ibu</label>
            <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu"
                value="<?=isset($orangtua->no_hp_ibu) ? $orangtua->no_hp_ibu : ''?>" required>
        </div>
    </div>
</div>