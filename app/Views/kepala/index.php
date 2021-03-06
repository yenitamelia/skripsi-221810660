<?= $this->extend('layout/sidebar'); ?>

<?= $this->section('content'); ?>
<div class="container mx-auto px-6">


    <div class="bg-black bg-opacity-50 fixed inset-0 hidden justify-center items-center z-30 w-full h-sceen" id="overlay">
        <div class="bg-white py-2 px-3 rounded shadow-xl text-gray-800 absolute top-12 z-20">
            <div class="flex justify-between items-center p-3">
                <h4 class="font-bold" id="noSurat">Disposisi Surat No. </h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>

            <div class="mt-5 md:mt-0 max-w-lg">
                <form action="/Kepala/Surat/saveDisposisi" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_surat" id="idSurat">
                    <div class="shadow overflow-y-auto h-96 sm:rounded-md">
                        <div class="bg-white py-4 px-6">
                            <div class="">
                                <div class="mb-3">
                                    <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                                    <!-- <div class="text-sm" id="perihalSurat"></div> -->
                                    <input disabled class="text-sm w-full py-1 px-2" name="perihal_surat" id="perihalSurat">
                                </div>
                                <div class="mb-3 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Dari</label>
                                    <!-- <div class="text-sm" id="dariSurat"></div> -->
                                    <input disabled class="text-sm w-full py-1 px-2" name="dari_surat" id="dariSurat">
                                </div>
                                <div class="mb-4 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Disposisi Kepada</label>
                                    <div class="mt-2 space-y-2">
                                        <?php foreach ($role as $row) : ?>
                                            <?php if (($row["role_id"]) > 1 && ($row["role_id"]) < 8) : ?>
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
                                        <div id="tags-container">
                                            <div class="control-group">
                                                <select id="tags" class="tags font-heading text-xs" placeholder="Tandai orang"></select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="tags" id="tags_form">
                                    </div>
                                </div>
                                <div class="mb-3 sm:col-span-4">
                                    <label for="dari" class="block text-sm font-medium text-gray-700">Isi Disposisi</label>
                                    <div class="text-sm mt-2"><textarea name="isi-disposisi" id="isi-disposisi" cols="60" rows="4" class="border border-gray-400 rounded-md p-2 focus:ring focus:outline-none"></textarea></div>
                                </div>
                                <div class="sm:col-span-4">
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

    <div class="flex justify-between">
        <div>
            <label for="filterRole">Filter</label>
            <select id="filterRole" name="role" class="rounded-md">
                <option value="" class="rounded-md">Semua</option>
                <?php foreach ($role as $r) : ?>
                    <?php if ($r['role_id'] > 1 && $r['role_id'] < 8) : ?>
                        <option value="<?= $r['role_id'] ?>" <?php if ($r['role_id'] == $roleId) {
                                                                    echo 'selected';
                                                                } ?>><?= $r['description'] ?>
                        </option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <?php if (session('role_id') == 2) : ?>
            <!-- Tombol Tambah Surat -->
            <a href="/Kasubag/surat/create" class="mb-5 bg-blue-500 hover:bg-blue-600 rounded text-sm text-white px-3 py-1">+ Tambah Surat Masuk</a>
        <?php endif; ?>
    </div>

    <div class="mt-5">
        <table id="myTable" class="display text-sm" width="100%">
            <thead>
                <tr>
                    <th class="w-1/9">No</th>
                    <th class="w-1/6">Nomor Agenda</th>
                    <th class="w-1/6">Tanggal Surat</th>
                    <th class="w-1/3">Perihal</th>
                    <th class="w-1/5">Disposisi Saat Ini</th>
                    <th class="w-1/9">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($surat as $s) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $s['nomor_agenda'];; ?></td>
                        <td><?= $s['tanggal']; ?></td>
                        <td><?= $s['perihal']; ?></td>
                        <?php if ($s['status_disposisi'] == 0) : ?>

                            <td class="text-center justify content-center items-center justify-center justify-content-center align-items-center">
                                <div class="flex items-center">
                                    <div class="px-2 py-1 w-11 mr-2 cursor-pointer text-center flex-auto justify-center justify-content-center bg-yellow-500 hover:bg-yellow-600 text-gray-100 rounded-lg shadow text-xs" id="disposisi-btn<?= $s['id']; ?>" onclick="modalDisposisi('<?= $s['id']; ?>','<?= $s['perihal']; ?>','<?= $s['dari']; ?>','<?= $s['nomor_surat']; ?>')">
                                        Disposisi
                                    </div>
                                </div>
                            </td>
                        <?php else : ?>
                            <td class="text-center justify content-center items-center justify-center justify-content-center align-items-center">
                                <div class="flex items-center">
                                    <div class="py-1 text-xs flex-auto bg-green-400 rounded-lg">Tersimpan</div>
                                </div>
                            </td>
                        <?php endif; ?>
                        <td class="text-center">
                            <a href="/Kepala/Surat/detail/<?= $s['id']; ?>" class="bg-blue-500 hover:bg-blue-600 text-xs rounded text-white px-3 py-1">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    //buat tags
    var formatTags = function(item) {
        return $.trim((item.name || ''));
    };

    $('#tags').selectize({
        plugins: ['remove_button'],
        persist: false,
        valueField: 'id',
        labelField: 'name',
        searchField: ['name'],
        sortField: [{
            field: 'name',
            direction: 'asc'
        }],
        maxOptions: 5,
        maxItems: 10,
        options: [
            <?php foreach ($users as $u) {
                // if ($u['id'] !== session()['id'])
                echo ("{
                        name: \"" . $u['email'] . "\",
                        id: \"" . $u['id'] . "\"
                    },");
            } ?>
        ],
        render: {
            item: function(item, escape) {
                var name = formatTags(item);
                return '<div>' +
                    (name ? '<span class="name">' + escape(name) + '</span>' : '') +
                    '</div>';
            },
            option: function(item, escape) {
                var name = formatTags(item);
                var label = name;
                var caption = name;
                return '<div>' +
                    '<span class="label">' + escape(label) + '</span>' +
                    (caption ? '<span class="caption">' + escape(caption) + '</span>' : '') +
                    '</div>';
            }
        }
    });

    $('#tags').change(function() {
        $tags = $('#tags').val();
        $('#tags_form').val($tags);
    });

    $(function() {
        $("select").selectize(options);
    });
</script>
<script type="text/javascript" charset="utf8" src="https://releases.jquery.com/git/jquery-3.x-git.js"></script>
<script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $('#filterRole').on('change', function(e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        const parser = new URL(window.location);
        parser.searchParams.set('role', valueSelected);
        window.location = parser.href;
    });
</script>




<?= $this->endSection(); ?>