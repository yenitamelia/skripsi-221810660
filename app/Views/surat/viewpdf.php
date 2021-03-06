<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto px-6">
    <div class="text-2xl mt-2">Detail Surat <?= $surat['perihal']; ?></div>
    <table class="table-fixed text-center">
        <thead>
            <tr>
                <td class="w-1/2">Nomor Agenda</td>
                <td class="w-1/2"><?= $surat['nomor_agenda']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Tanggal Penerimaan</td>
                <td class="w-1/2"><?= $surat['tanggal_penerimaan']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Tingkat Keamanan</td>
                <td class="w-1/2"><?= $surat['tk_keamanan']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Tanggal Penyelesaian</td>
                <td class="w-1/2"><?= $surat['tanggal_penyelesaian']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Tanggal Surat</td>
                <td class="w-1/2"><?= $surat['tanggal']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Nomor Surat</td>
                <td class="w-1/2"><?= $surat['nomor_surat']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Dari</td>
                <td class="w-1/2"><?= $surat['dari']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Perihal</td>
                <td class="w-1/2"><?= $surat['perihal']; ?></td>
            </tr>
            <tr>
                <td class="w-1/2">Lampiran</td>
                <td class="w-1/2"><?= $surat['lampiran']; ?></td>
            </tr>
        </thead>
    </table>

    <div class="text-2xl mt-2">Form Disposisi</div>
    <!-- Nampilin pesan error di view -->
    <!-- <h1>$validation->ListErrors();</h1> -->
    <form action="/surat/saveDisposisi" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <!-- Menyimpan file lampiran lama biar ga bermasalah waktu yg diganti cuman judulnya aja, dst -->
        <input type="hidden" name="lampiranLama" value="<?= old('lampiran'); ?>">
        <div class="grid grid-cols-6">
            <label for="isi_disposisi">Isi Disposisi</label>
            <input type="text" id="isi_disposisi" name="isi_disposisi" class="border-2 <?= ($validation->hasError('isi_disposisi')) ? 'border-red-500' : 'border-blue-500'; ?> rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('isi_disposisi'); ?>">
        </div>
        <div class="mb-3 grid grid-cols-6">
            <div></div>
            <div class="items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <?= $validation->getError('isi_disposisi'); ?>
            </div>
        </div>
        <div class="grid grid-cols-6">
            <label for="tanggal_penerimaan">Diteruskan kepada :</label>
            <input type="checkbox" id="kfSosial" name="kfSosial" value="kfSosial">
            <label for="kfSosial">Kf Bidang Sosial</label><br>
            <input type="checkbox" id="kfEkonomi" name="kfEkonomi" value="kfEkonomi">
            <label for="kfEkonomi">Kf Bidang Ekonomi</label><br>
            <input type="checkbox" id="kfKependudukan" name="kfKependudukan" value="kfKependudukan">
            <label for="kfKependudukan">Kf Bidang Kependudukan</label><br><br>
        </div>

        <!-- <div class="mb-3 grid grid-cols-6">
            <label for="lampiran">Lampiran</label>
            <input type="text" id="lampiran" name="lampiran" class="border-2 border-blue-500 rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('lampiran'); ?>">
        </div> -->
        <p class="text-blue-500 font-bold">Unggah Tanda Tangan Elektronik</p>
        <div class="flex mt-5">
            <div class="flex justify-start items-center mb-1 w-full relative">
                <input type="file" hidden accept=".doc, .docx, .pdf" title="Pilih File" id='gambar' name="gambar" onchange="label()">
                <label for="gambar" title="Harus Diisi" class="bg-blue-500 text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-blue-400 transition-colors duration-300 text-xs mr-4 outline-none">Pilih Gambar</label>
                <span class="customLabel text-blue-500 absolute md:left-28 left-28 select-none cursor-default cursor md:text-sm text-sm" id="labelgambar"><?= old('gambarLama'); ?></span>
            </div>
        </div>
        <div class="font-medium tracking-wide text-red-500 text-xs ml-1 mb-2">
            <?= $validation->getError('gambar'); ?>
        </div>

        <button type="submit" class="bg-blue-500 rounded-xl text-sm text-white px-3 py-1">Submit</button>
    </form>

    <div class="mt-5">
        <!-- <iframe src="lampiran/" height="100%" width="100%" title="W3Schools Free Online Web Tutorials"></iframe> -->
        <iframe src="www.google.com" height="500px" width="100%" title="W3Schools Free Online Web Tutorials"></iframe>
    </div>

    <a href="/surat/edit/<?= $surat['id']; ?>" class="bg-yellow-500 rounded-xl text-sm text-white px-3 py-1">Edit</a>
    <div>
        <a href="/surat/lembar/<?= $surat['id']; ?>" class="bg-blue-500 rounded-xl text-sm text-white px-3 py-1">Lembar</a>
    </div>
    <form action="/surat/<?= $surat['id']; ?>" method="POST" class="inline">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="bg-red-500 rounded-xl text-sm text-white px-3 py-1" onclick="return confirm('Apakah Anda Yakin?');">Delete</button>
    </form>

    <a href="/surat" class="text-blue-500">Kembali ke daftar surat</a>
</div>
<?= $this->endSection(); ?>