<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="/css/tailwind1.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        tr.none td {
            /* border-collapse: collapse; */
            border: none;

        }

        @media print {

            @page {
                margin-top: 30px;
                margin-bottom: 10px;
            }

            /* Hide every other elemet */
            body {
                margin: 0;
                position: relative;
            }

            .sidebar,
            .open {
                display: none;
                visibility: hidden;
            }

            body * {
                margin: 0;
                visibility: hidden;
            }

            /* Then displaying print container elements */
            .print-container,
            .print-container * {
                visibility: visible;
            }

            /* Adjusting the postition to always start from top left */
            .print-container {
                position: absolute;
                top: 0px;
                left: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar open">
        <div class="logo-details">
            <i class='bx bxl-c-plus-plus icon'></i>
            <div class="logo_name">SIMRAT</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <?php if (in_array(session()->auth_groups_id, [1, 2, 3, 4, 5, 6])) : ?>
                    <a href="/Kasubag/Home">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                <?php endif; ?>
            </li>
            <li>
                <?php if (session('auth_groups_id') == 2) : ?>
                    <a href="/Kasubag/Role">
                        <i class='bx bx-user'></i>
                        <span class="links_name">Role</span>
                    </a>
                <?php endif; ?>
            </li>
            <!-- <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
                <span class="tooltip">Messages</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li> -->
            <li>
                <?php if (session('auth_groups_id') == 1) : ?>
                    <a href="/kepala/surat">
                    <?php elseif (session('auth_groups_id') == 2) : ?>
                        <a href="/kasubag/surat">
                        <?php else : ?>
                            <a href="/tim/surat/">
                            <?php endif; ?>
                            <i class='bx bx-archive-in'></i>
                            <span class="links_name">Surat Masuk</span>
                            </a>
                        </a>
                    </a>
            </li>
            <li>
                <?php if (session('auth_groups_id') == 2) : ?>
                    <a href="/Kasubag/Surat/indexx">
                        <i class='bx bx-archive'></i>
                        <span class="links_name">Disposisi Surat</span>
                    </a>
                <?php endif; ?>
            </li>
            <li>
                <?php if (session('auth_groups_id') == 2) : ?>
                    <a href="/Kasubag/SuratKeluar">
                        <i class='bx bx-archive-out'></i>
                        <span class="links_name">Surat Keluar</span>
                    </a>
                    <span class="tooltip">Surat Keluar</span>
                <?php endif; ?>
            </li>

            <!-- <li>
                <a href="#">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Saved</span>
                </a>
                <span class="tooltip">Saved</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li> -->
            <li class="profile">
                <div class="profile-details">
                    <!--<img src="profile.jpg" alt="profileImg">-->
                    <div class="name_job">
                        <div class="name">Yenita Amelia</div>
                        <div class="job">Admin</div>
                    </div>
                </div>
                <a href="<?= base_url('logout'); ?>">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <?= $this->renderSection('content'); ?>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
    <script>
        $('#lampiran').change(function() {
            $(this).next().next().text(this.files[0].name)
        });


        //add new aktivitas
        $('#saveDisposisi').submit(function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        if (data.code == 1) {
                            $(form)[0].reset();
                            $("#isi_disposisi").load("<?= base_url('User/getIsiDisposisi') ?>", function(responseTxt, statusTxt, xhr) {
                                if (statusTxt == "success")
                                    responseTxt;
                                if (statusTxt == "error")
                                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                            });
                        } else {
                            alert(data.msg);
                        }
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val);
                        })
                    }
                }
            });
        });

        $(document).ready(function() {
            $("#isi_disposisi").load("<?= base_url('User/getIsiDisposisi') ?>", function(responseTxt, statusTxt, xhr) {
                if (statusTxt == "success")
                    responseTxt;
                if (statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });
        });
    </script>
    <script>
        function label() {
            const lampiran = document.querySelector('#lampiran');
            const lampiranLabel = document.querySelector('.customLabel');
            lampiranLabel.textContent = lampiran.files[0].name;
        }

        function label_keluar() {
            const file_keluar = document.querySelector('#file_keluar');
            const file_keluarLabel = document.querySelector('.customLabel');
            file_keluarLabel.textContent = file_keluar.files[0].name;
        }

        function label2() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.customLabel');
            gambarLabel.textContent = gambar.files[0].name;
        }
    </script>

    <script>
        function deleteKasubag(id) {
            const overlay = document.querySelector('#overlayy')
            const deleteBtn = document.querySelector('#delete-btn' + id)
            const closeBtn = document.querySelector('#close-modal-delete')
            const closeBtn2 = document.querySelector('#close-modal2-delete')


            // When the user clicks the button, open the modal 
            deleteBtn.onclick = function() {
                overlay.style.display = "flex";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn.onclick = function() {
                overlay.style.display = "none";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn2.onclick = function() {
                overlay.style.display = "none";
            }

            $('#delete_kasubag').attr('action', '/Kasubag/Surat/delete/' + id);

        }
    </script>

    <script>
        function deleteRole(id) {
            const overlay = document.querySelector('#overlay2')
            const deleteBtn = document.querySelector('#delete-btn' + id)
            const closeBtn = document.querySelector('#close-modal-delete')
            const closeBtn2 = document.querySelector('#close-modal2-delete')

            // When the user clicks the button, open the modal 
            deleteBtn.onclick = function() {
                overlay.style.display = "flex";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn.onclick = function() {
                overlay.style.display = "none";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn2.onclick = function() {
                overlay.style.display = "none";
            }

            $('#delete_role').attr('action', '/Kasubag/Role/delete/' + id);

        }
    </script>

    <script>
        function deleteKasubagKeluar(id) {
            const overlay = document.querySelector('#overlayy2')
            const deleteBtn = document.querySelector('#delete-btn' + id)
            const closeBtn = document.querySelector('#close-modal-delete2')
            const closeBtn2 = document.querySelector('#close-modal2-delete2')


            // When the user clicks the button, open the modal 
            deleteBtn.onclick = function() {
                overlay.style.display = "flex";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn.onclick = function() {
                overlay.style.display = "none";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn2.onclick = function() {
                overlay.style.display = "none";
            }

            $('#delete_kasubag_keluar').attr('action', '/Kasubag/SuratKeluar/delete/' + id);

        }
    </script>

    <script>
        function modalpdf(id, no) {
            const overlay = document.querySelector('#overlay')
            const disposisiBtn = document.querySelector('#disposisi-btn' + id)
            const closeBtn = document.querySelector('#close-modal')
            const closeBtn2 = document.querySelector('#close-modal2')


            // When the user clicks the button, open the modal 
            disposisiBtn.onclick = function() {
                overlay.style.display = "flex";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn.onclick = function() {
                overlay.style.display = "none";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn2.onclick = function() {
                overlay.style.display = "none";
            }

            // const toggleModal = () => {
            //     overlay.classList.toggle('hidden')
            //     overlay.classList.toggle('flex')
            // }

            // disposisiBtn.addEventListener('click', toggleModal)

            // closeBtn.addEventListener('click', toggleModal)

            $("#idSurat").val(id);
            $("#perihalSurat").val(perihal);
            $("#dariSurat").val(dari);
            document.getElementById("noSurat").textContent += no;
        }
    </script>

    <script>
        function modalDisposisi(id, perihal, dari, no) {

            const overlay = document.querySelector('#overlay')
            const disposisiBtn = document.querySelector('#disposisi-btn' + id)
            const closeBtn = document.querySelector('#close-modal')
            const closeBtn2 = document.querySelector('#close-modal2')


            // When the user clicks the button, open the modal 
            disposisiBtn.onclick = function() {
                overlay.style.display = "flex";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn.onclick = function() {
                overlay.style.display = "none";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn2.onclick = function() {
                overlay.style.display = "none";
            }

            // const toggleModal = () => {
            //     overlay.classList.toggle('hidden')
            //     overlay.classList.toggle('flex')
            // }

            // disposisiBtn.addEventListener('click', toggleModal)

            // closeBtn.addEventListener('click', toggleModal)

            $("#idSurat").val(id);
            $("#perihalSurat").val(perihal);
            $("#dariSurat").val(dari);
            document.getElementById("noSurat").textContent += no;
        }
    </script>

    <script>
        function modalDisposisiKasubag(id, perihal, dari, no) {

            const overlay = document.querySelector('#overlay')
            const disposisiBtn = document.querySelector('#disposisi-btn' + id)
            const closeBtn = document.querySelector('#close-modal')
            const closeBtn2 = document.querySelector('#close-modal2')


            // When the user clicks the button, open the modal 
            disposisiBtn.onclick = function() {
                overlay.style.display = "flex";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn.onclick = function() {
                overlay.style.display = "none";
            }

            // When the user clicks on <span> (x), close the overlay
            closeBtn2.onclick = function() {
                overlay.style.display = "none";
            }

            // const toggleModal = () => {
            //     overlay.classList.toggle('hidden')
            //     overlay.classList.toggle('flex')
            // }

            // disposisiBtn.addEventListener('click', toggleModal)

            // closeBtn.addEventListener('click', toggleModal)

            $.get('/Kasubag/Surat/modaldisposisikepada', {
                surat_id: id
            }, (data) => {
                li = ''
                data.forEach(d => {
                    li += `<li>${d.description}</li>`
                })
                $('#showRole').html(`<ul>${li}</ul>`)
                $("#isi-disposisi").val(data[0]['isi_disposisi']);
                $("#gambar").attr('src', '/gambar/' + data[0]['gambar']);
                console.log(data);
            })
            $("#idSurat").val(id);
            $("#perihalSurat").val(perihal);
            $("#dariSurat").val(dari);
            // $("#showRole").html('halo');
            document.getElementById("noSurat").textContent += no;
            // belum bisa ngelist KF
        }
    </script>

    <script>
        document.getElementsByClassName("tablink")[0].click();

        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].classList.remove("bg-white");
                tablinks[i].classList.remove("p-3");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.classList.add("bg-white");
            evt.currentTarget.classList.add("p-3");
        }
    </script>
</body>

</html>