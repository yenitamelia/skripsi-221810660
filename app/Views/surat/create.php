<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mx-auto px-6">
    <div class="text-2xl mt-2">Form Tambah Surat Masuk</div>
    <!-- Nampilin pesan error di view -->
    <!-- <h1>$validation->ListErrors();</h1> -->
    <form action="/surat/save" method="post">
        <?= csrf_field(); ?>
        <div class="grid grid-cols-6">
            <label for="date">Tanggal Surat</label>
            <input type="date" id="date" name="tanggal" class="border-2 <?= ($validation->hasError('tanggal')) ? 'border-red-500' : 'border-blue-500'; ?> rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('tanggal'); ?>">
        </div>
        <div class="mb-3 grid grid-cols-6">
            <div></div>
            <div class="items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <?= $validation->getError('tanggal'); ?>
            </div>
        </div>
        <div class="grid grid-cols-6">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" id="nomor_surat" name="nomor_surat" class="border-2 <?= ($validation->hasError('nomor_surat')) ? 'border-2 border-red-500' : 'border-blue-500'; ?> rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('nomor_surat'); ?>">
        </div>
        <div class="mb-3 grid grid-cols-6">
            <div></div>
            <div class="items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <?= $validation->getError('nomor_surat'); ?>
            </div>
        </div>
        <div class="grid grid-cols-6">
            <label for="dari">Dari</label>
            <input type="text" id="dari" name="dari" class="border-2 <?= ($validation->hasError('dari')) ? 'border-2 border-red-500' : 'border-blue-500'; ?> rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('dari'); ?>">
        </div>
        <div class="mb-3 grid grid-cols-6">
            <div></div>
            <div class="items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <?= $validation->getError('dari'); ?>
            </div>
        </div>
        <div class="grid grid-cols-6">
            <label for="perihal">Perihal</label>
            <input type="text" id="perihal" name="perihal" class="border-2 <?= ($validation->hasError('perihal')) ? 'border-2 border-red-500' : 'border-blue-500'; ?> rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('perihal'); ?>">
        </div>
        <div class="mb-3 grid grid-cols-6">
            <div></div>
            <div class="items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                <?= $validation->getError('perihal'); ?>
            </div>
        </div>
        <div class="mb-3 grid grid-cols-6">
            <label for="lampiran">Lampiran</label>
            <input type="text" id="lampiran" name="lampiran" class="border-2 border-blue-500 rounded-lg focus:outline-none focus:ring focus:border-blue-300 px-2" value="<?= old('lampiran'); ?>">
        </div>
        <button type="submit" class="bg-blue-500 rounded-xl text-sm text-white px-3 py-1">Submit</button>
    </form>
</div>

<?= $this->endSection(); ?>