<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link href="<?php echo base_url('assets/admin/css/custom/print.css') ?>" rel="stylesheet">
    <style>
    .overlay {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: #e5e5e5;
    }

    .loader {
        left: 50%;
        margin-left: -4em;
        font-size: 10px;
        border: 7px solid rgb(180, 180, 180);
        border-left: 7px solid #214ba3;
        animation: spin 1.1s infinite linear;
    }

    .loader,
    .loader:after {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: block;
        position: absolute;
        top: 50%;
        margin-top: -4.05em;
    }

    @keyframes spin {
        0% {
            transform: rotate(360deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }
    </style>
</head>

<body>
    <div id="overlay" class="loader"></div>
    <div class="kop-surat" style="display: flex; align-items: center; margin-bottom: 20px;">
        <img src="<?php echo base_url('assets/admin/img/logo.png') ?>" alt="Logo Desa"
            style="width: 80px; margin-right: 20px;">
        <div>
            <h2 style="margin: 0;">PONDOK PESANTREN AL-MUTHOHHAR</h2>
            <p style="margin: 0;">Kampung Legok, rt.10, rw.01, Desa Palinggihan, Kecamatan Plered, Kabupaten Purwakarta
            </p>
        </div>
    </div>
    <div class="garis" style="border-top: 2px solid black; margin-bottom: 20px;"></div>
    <div class="kop-surat" style="text-align: center; margin-bottom: 20px;">
        <h3>Formulir Pendaftaran Penerimaan Santri Baru TP <?=date('Y');?>-<?=date('Y') + 1;?></h3>
    </div>
    <page>
        <table class="table" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr>
                    <th colspan="2" style="padding: 8px; text-align: left; background-color: #f2f2f2;">1. Biodata
                        Peserta Didik</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; width: 30%;">Nama Lengkap</td>
                    <td style="padding: 8px;"><?=ucfirst($siswa->nama ?? '-')?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Jenis Kelamin</td>
                    <td style="padding: 8px;"><?=$siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">NISN</td>
                    <td style="padding: 8px;"><?=$siswa->nisn ?? '-'?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">NIK</td>
                    <td style="padding: 8px;"><?=$siswa->nik ?? '-'?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Tempat Lahir</td>
                    <td style="padding: 8px;"><?=ucfirst($siswa->tempat_lahir ?? '-')?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Tanggal Lahir</td>
                    <td style="padding: 8px;"><?=date('d F Y', strtotime($siswa->tanggal_lahir ?? '19/01/2000'))?></td>
                </tr>
                <tr>
                    <th colspan="2" style="padding: 8px; text-align: left; background-color: #f2f2f2;">2. Alamat
                        Peserta Didik</th>
                </tr>
                <tr>
                    <td style="padding: 8px;">Alamat Jalan</td>
                    <td style="padding: 8px;"><?=$alamat->alamat ?? '-'?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">RT/RW</td>
                    <td style="padding: 8px;"><?=$alamat->rt ?? '-'?>/<?=$alamat->rw ?? '-'?></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Desa/Kelurahan</td>
                    <td style="padding: 8px;" id="desa"></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Kecamatan</td>
                    <td style="padding: 8px;" id="kecamatan"></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Kabupaten</td>
                    <td style="padding: 8px;" id="kabupaten"></td>
                </tr>
                <tr>
                    <td style="padding: 8px;">Provinsi</td>
                    <td style="padding: 8px;" id="provinsi"></td>
                </tr>
            </tbody>
        </table>

        <div style="position: fixed; bottom: 100px; right: 50px; text-align: center;">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <!-- Tanggal -->
                <p style="margin-bottom: 10px;">Purwakarta, 02 Desember 2024</p>

                <!-- Kotak Materai -->
                <div
                    style="width: 100px; height: 40px; border: 2px solid black; text-align: center; line-height: 20px; margin-bottom: 20px;">
                    Materai<br>Rp.10.000
                </div>

                <!-- Nama Siswa -->
                <p>(<?=ucwords($siswa->nama ?? '-')?>)</p>
            </div>
        </div>

    </page>
    <?php $this->load->view('templates/script');?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#overlay').css('visibility', 'visible');
        // Fungsi untuk permintaan data AJAX
        function fetchData(url, id, target) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        let result = response.find(item => item.id == id);
                        if (result) {
                            $(target).text(result.name);
                        }
                        resolve(); // Resolusi ketika selesai
                    },
                    error: function() {
                        console.log("Gagal memuat data dari " + url);
                        reject(); // Reject jika gagal
                    }
                });
            });
        }

        // Array Promise untuk setiap permintaan data
        let requests = [
            fetchData("<?=base_url('client/formulir/get_provinces');?>", "<?=$alamat->provinsi?>",
                "#provinsi"),
            fetchData("<?=base_url('client/formulir/get_regencies') . '/' . $alamat->provinsi;?>",
                "<?=$alamat->kabupaten?>", "#kabupaten"),
            fetchData("<?=base_url('client/formulir/get_districts') . '/' . $alamat->kabupaten;?>",
                "<?=$alamat->kecamatan?>", "#kecamatan"),
            fetchData("<?=base_url('client/formulir/get_villages') . '/' . $alamat->kecamatan;?>",
                "<?=$alamat->desa?>", "#desa")
        ];

        // Tunggu semua permintaan selesai
        Promise.all(requests).then(() => {
            console.log("Semua data berhasil dimuat. Mencetak...");
            // Menyembunyikan loader setelah data selesai dimuat
            $('#overlay').css('visibility', 'hidden');

            window.print(); // Cetak setelah semua data selesai
        }).catch(() => {
            console.log("Ada data yang gagal dimuat. Tidak mencetak.");
        });
    });
    </script>

</body>



</html>