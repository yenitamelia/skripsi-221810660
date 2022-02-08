<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto px-6">


    <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-30 w-full h-sceen" id="overlay">
        <div class="bg-white py-2 px-3 rounded shadow-xl text-gray-800 absolute top-12 z-20">
            <div class="flex justify-between items-center p-3">
                <h4 class="font-bold">Disposisi Surat No. A218271892</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="/surat/saveDisposisi" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_surat" id="idSurat">
                    <div class="shadow overflow-y-auto h-96 sm:rounded-md">
                        <div class="bg-white py-4 px-6">
                            <div class="grid gap-3">
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                                    <!-- <div class="text-sm" id="perihalSurat"></div> -->
                                    <input disabled class="text-sm" name="perihal_surat" id="perihalSurat">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Dari</label>
                                    <!-- <div class="text-sm" id="dariSurat"></div> -->
                                    <input disabled class="text-sm" name="dari_surat" id="dariSurat">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Disposisi Kepada</label>
                                    <div class="mt-2 space-y-2">
                                        <?php foreach ($role as $row) : ?>
                                            <?php if (($row["id"]) > 2) : ?>
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input type="checkbox" id="<?= $row["name"]; ?>" name="<?= $row["id"]; ?>" value="<?= $row["id"]; ?>" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="<?= $row["name"]; ?>"><?= $row["description"]; ?></label><br>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Isi Disposisi</label>
                                    <div class="text-sm mt-2"><textarea name="isi-disposisi" id="isi-disposisi" cols="60" rows="4" class="border border-gray-400 rounded-md p-2 focus:ring focus:outline-none"></textarea></div>
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Unggah Tanda Tangan</label>
                                    <div class="flex mt-5">
                                        <div class="flex justify-start items-center mb-1 w-full relative">
                                            <input type="file" hidden accept="image/jpg,image/jpeg,image/png" title="Pilih File" id='gambar' name="gambar" onchange="label2()">
                                            <label for="gambar" title="Harus Diisi" class="bg-blue-500 text-white rounded-full w-24 py-1 text-center cursor-pointer hover:bg-blue-400 transition-colors duration-300 text-xs mr-4 outline-none">Pilih Gambar</label>
                                            <span class="customLabel text-blue-500 absolute md:left-28 left-28 select-none cursor-default cursor md:text-sm text-sm" id="labelGambar"><?= old('gambarLama'); ?></span>
                                        </div>
                                    </div>
                                    <div class="font-medium tracking-wide text-red-500 text-xs ml-1 mb-2">
                                        <?= $validation->getError('gambar'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <div id="close-modal2" class="cursor-pointer inline-flex justify-center closeBtn py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-gray-400 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancel
                            </div>
                            <button type="submit" class="inline-flex justify-center disposisiBtn ml-1 py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="text-2xl py-5">Data Surat Masuk</div>
    <!-- Alert jika data berhasil ditambahkan -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="bg-green-200 text-green-600 text-sm py-3 px-6 rounded-lg mb-5">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php if (in_groups('bid_umum')) : ?>
        <!-- Tombol Tambah Surat -->
        <a href="/surat/create" class="mb-5 bg-blue-500 hover:bg-blue-600 rounded text-sm text-white px-3 py-1">+ Tambah Surat Masuk</a>
    <?php endif; ?>
    <div class="mt-5">
        <table id="myTable" class="display text-sm" width="100%">
            <thead>
                <tr>
                    <th class="w-1/10">No</th>
                    <th class="w-1/8">Tanggal Surat</th>
                    <th class="w-1/8">Tanggal Diterima</th>
                    <th class="w-1/3">Perihal</th>
                    <th class="w-1/4">Disposisi Saat Ini</th>
                    <th class="w-1/7">Aksi</th>
                    <!-- <th class="w-1/5">Aksi 2</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($surat as $s) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $s['tanggal']; ?></td>
                        <td><?= $s['tanggal_penerimaan'];; ?></td>
                        <td><?= $s['perihal']; ?></td>
                        <td class="text-center justify-center justify-content-center align-items-center">
                            <div class="flex">
                                <div class="px-2 py-1 w-11 cursor-pointer text-center flex-auto justify-center justify-content-center bg-yellow-500 hover:bg-yellow-600 text-gray-100 rounded shadow text-xs" id="disposisi-btn<?= $s['id']; ?>" onclick="modalDisposisi('<?= $s['id']; ?>','<?= $s['perihal']; ?>','<?= $s['dari']; ?>')">
                                    Disposisi
                                </div>
                                <div class="text-xs flex-auto">Menunggu Disposisi</div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="/surat/<?= $s['id']; ?>" class="bg-blue-500 hover:bg-blue-600 text-xs rounded text-white px-3 py-1">Detail</a>
                        </td>
                        <!-- <td>
                        <a href="/surat/viewpdf/<?= $s['id']; ?>" class="bg-blue-500 rounded-xl text-sm text-white px-3 py-1">View Kepala</a>
                    </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript" charset="utf8" src="https://releases.jquery.com/git/jquery-3.x-git.js"></script>
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>




<?= $this->endSection(); ?>