@extends('layouts.logged-navbar')

@section('content')
<div class="wrappers" style="font-size: 18px;">
    <div id="sidebar" class="position-fixed bg-white">
        <div class="border-end bg-white" id="sidebar-wrapper">
            <br><br>
            <div class="list-group list-group-flush">
                <a href="/help?code=buat-akun" class="text-black list-group-item p-3">
                    Buat Akun Baru
                </a>
                <a href="/help?code=masuk-akun" class="text-black list-group-item p-3">
                    Masuk Kedalam Sistem
                </a>
                <a href="/help?code=generate" class="text-black list-group-item p-3">
                    Menggunakan Fitur Generator Soal
                </a>
                <a href="/help?code=lihat-koleksi" class="text-black list-group-item p-3">
                    Melihat Koleksi Soal
                </a>
                <div id="accordionWrapper">
                    <div class="accordion" id="demoAccordion">
                        <a class="text-black list-group-item p-3" data-bs-toggle="collapse" data-bs-target="#demoCollapse" aria-expanded="true" aria-controls="demoCollapse">
                            Menggunakan Fitur Demo
                        </a>
                        <div id="demoCollapse" class="collapse" aria-labelledby="demoAccordion" data-bs-parent="#accordionWrapper">
                            <a href="/help?code=demo-generate" class="text-black list-group-item p-3 ps-5">
                                Fitur Demo Generate Soal
                            </a>
                            <a href="/help?code=demo-koleksi" class="text-black list-group-item p-3 ps-5">
                                Fitur Koleksi Soal
                            </a>
                            <a href="/help?code=demo-cbt" class="text-black list-group-item p-3 ps-5">
                                Fitur Demo CBT
                            </a>
                        </div>
                    </div>

                    <div class="accordion" id="cbtAccordion">
                        <a class="text-black list-group-item p-3" data-bs-toggle="collapse" data-bs-target="#cbtCollapse" aria-expanded="true" aria-controls="cbtCollapse">
                            Computer Based Test
                        </a>
                        <div id="cbtCollapse" class="collapse" aria-labelledby="cbtAccordion" data-bs-parent="#accordionWrapper">
                            <a href="/help?code=create-cbt" class="text-black list-group-item p-3 ps-5">
                                Membuat CBT
                            </a>
                            <a href="/help?code=start-cbt" class="text-black list-group-item p-3 ps-5">
                                Mengikuti CBT
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="content">
        <button class="btn bg-color-primary text-white hidden-btn mt-3 px-2" id="sidebarBtn" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <iconify-icon inline icon="ic:round-menu"></iconify-icon>
            <span> Panduan Pengguna </span>
        </button>
        <div class="row">
            <div class=" px-3">
                <div class="card shadow p-3 pt-4">
                    <div class="row">
                        <div class="col">
                            @if (isset($_GET['code']))
                            @if ($_GET['code'] == "buat-akun")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara membuat akun baru
                                    </b>
                                </h4>
                                <p>
                                    Untuk membuat akun baru, silahkan masuk ke halaman Login dengan menekan tombol "Masuk" yang ada pada bagian kanan atas halaman. <br><br>
                                    <img src="/assets/images/user-guide/navbar-login.png" alt="" width="100%"> <br><br>
                                    Setelah itu anda akan diarahkan menuju form untuk memasuki sistem. Namun setelah itu, anda dapat menekan tombol "Register" pada bagian bawah tombol "Login". <br><br>
                                    <img src="/assets/images/user-guide/login-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah itu anda akan diarahkan menuju halaman registrasi akun seperti pada gambar di bawah ini. Pada halaman ini anda diminta untuk mengisi formulir dengan data yang valid. <br><br>
                                    <img src="/assets/images/user-guide/regist-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Jika sudah mengisi form tersebut, anda hanya perlu menekan tombol "Register" untuk membuat akun baru.
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "masuk-akun")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara masuk kedalam sistem Smart Engtest
                                    </b>
                                </h4>
                                <p>
                                    Untuk masuk kedalam sistem Smart Engtest silahkan masuk ke halaman Login dengan menekan tombol "Masuk" yang ada pada bagian kanan atas halaman. <br><br>
                                    <img src="/assets/images/user-guide/navbar-login.png" alt="" width="100%"> <br><br>
                                    Setelah itu anda akan diarahkan menuju form untuk memasuki sistem seperti gambar di bawah ini. <br><br>
                                    <img src="/assets/images/user-guide/login-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Jika sudah isi form yang tersedia dengan data yang telah terdaftar pada sistem, lalu jika semua sudah terisi klik tombol "Masuk" untuk memasuki sistem Smart Engtest.
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "lihat-koleksi")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara melihat koleksi
                                    </b>
                                </h4>
                                <p>
                                    Pertama-tama, pastikan anda telah login (masuk kedalam sistem). Untuk melihat koleksi soal, silahkan masuk ke halaman koleksi dengan menekan tombol "Koleksi" yang ada pada bagian navbar atas halaman. <br><br>
                                    <img src="/assets/images/user-guide/navbar-sudah-login.png" alt="" width="100%"> <br><br>
                                    Setelah itu, anda akan diarahkan ke halaman koleksi. Jika tampilan sudah seperti gambar berikut <br><br>
                                    <img src="/assets/images/user-guide/koleksi-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Anda dapat melihat koleksi soal yang telah anda buat sebelumnya dengan cara menekan salah satu koleksi yang tersedia. Jika sudah menekannya, anda akan diarahkan menuju halaman detail koleksi seperti berikut. <br><br>
                                    <img src="/assets/images/user-guide/detail-koleksi-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini anda dapat melihat detail koleksi soal yang telah anda buat sebelumnya. Anda dapat melihat detail soal, mengedit soal, menghapus soal, dan mencetak soal.
                                    Jika anda menekan tombol hapus pada halaman detail koleksi, maka soal yang anda pilih akan terhapus dari koleksi soal anda. Sebelum data terhapus, anda akan diberikan sebuah pop-up konfirmasi untuk menghapus pertanyaan seperti berikut. Anda hanya perlu menekan tombol "Hapus" jika sudah yakin.<br><br>
                                    <img src="/assets/images/user-guide/delete-collection.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Selain itu, anda juga dapat mengedit soal yang dihasilkan oleh dengan cara menekan tombol edit pada halaman detail koleksi. Jika anda sudah selesai melakukan edit, anda hanya perlu menekan tombol "Simpan Perubahan", maka soal akan otomatis terupdate.<br><br>
                                    <img src="/assets/images/user-guide/update-collection.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "generate")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara menggunakan fitur generator soal
                                    </b>
                                </h4>
                                <p>
                                    Untuk menggunakan fitur Generator Soal, Anda perlu masuk terlebih dahulu ke dalam sistem Smart Engtest. Jika sudah Anda dapat memilih jenis soal yang ingin digenerate seperti gambar di bawah ini. <br> <br>
                                    <img src="/assets/images/user-guide/generate-page.png" alt="" class=" mx-auto d-block" width="100%"> <br>
                                    Setelah itu, isi form dengan tautan berita ataupun file dengan ekstensi (.txt) yang berisi berita/kalimat Bahasa Inggris yang akan dijadikan passage. Jika semua sudah terisi klik tombol "Generate" untuk melakukan Scrapping pada berita yang Anda masukan. <br><br>
                                    <img src="/assets/images/user-guide/input-passage.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah sistem menerima input, sistem akan menampilkan hasil passage yang telah di-scrap, dan Anda dapat mengedit kalimat tersebut jika ingin. <br><br>
                                    <img src="/assets/images/user-guide/preview-passage.png" alt="" class=" mx-auto d-block" width="100%"> <br>
                                    Jika sudah, Anda dapat menekan tombol "Generate", lalu sistem akan menampilkan soal-soal sesuai passage yang anda masukan seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/generate-result.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah soal muncul, anda dapat melihat jawaban dari soal-soal tersebut dengan menekan tombol "Lihat Jawaban" pada bagian bawah soal. Dan anda dapat menyembunyikan jawabannya lagi dengan menekan tombol "Sembunyikan Jawaban" <br><br>
                                    <img src="/assets/images/user-guide/show-answer.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Anda dapat menentukan soal mana saja yang ingin anda simpan ke dalam koleksi soal anda dengan mencentang soal-soal yang tersedia seperti berikut lalu tekan tombol simpan. <br><br>
                                    <img src="/assets/images/user-guide/select-question.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada bagian ini, anda dapat mengedit soal dan juga menghapus soal yang telah dibuat otomatis oleh sistem.
                                    Jika anda menekan tombol hapus pada halaman detail koleksi, maka soal yang anda pilih akan terhapus dari koleksi soal anda. Sebelum data terhapus, anda akan diberikan sebuah pop-up konfirmasi untuk menghapus pertanyaan seperti berikut. Anda hanya perlu menekan tombol "Hapus" jika sudah yakin.<br><br>
                                    <img src="/assets/images/user-guide/hapus.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Selain itu, anda juga dapat mengedit soal yang dihasilkan oleh dengan cara menekan tombol edit pada halaman detail koleksi. Jika anda sudah selesai melakukan edit, anda hanya perlu menekan tombol "Simpan Perubahan", maka soal akan otomatis terupdate.<br><br>
                                    <img src="/assets/images/user-guide/edit.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "create-cbt")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Computer Based Test
                                    </b>
                                </h4>
                                <p>
                                    Untuk menggunakan fitur CBT, Anda perlu masuk terlebih dahulu ke dalam sistem Smart Engtest. Jika sudah Anda dapat memilih menu CBT pada bagian navigasi bar atas seperti gambar di bawah ini. <br> <br>
                                    <img src="/assets/images/user-guide/navbar-sudah-login.png" alt="" width="100%"> <br><br>
                                    Ketika anda menekan tombol tersebut, maka anda akan diarahkan ke halaman CBT seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/cbt-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat memilih apa yang ingin anda kerjakan. Jika anda ingin membuat test baru, maka anda harus menekan tombol Test Dashboard. Sedangkan jika anda ingin mengikuti ujian, maka anda perlu menekan tombol Mulai Tes. <br><br>
                                    Jika anda ingin melihat dan membuat test baru, anda perlu menekan card "Test Dashboard". Ketika anda telah menekan tombol tersebut, maka anda akan diarahkan ke halaman dashboard test seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/cbt-dashboard.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Untuk membuat test baru, anda hanya perlu menekan tombol "Buat tes sekarang". Setelah itu, anda akan diarahkan ke halaman pembuatan test seperti gambar berikut. Anda hanya perlu mengisi sesuai data valid, kemudian tekan tombol "Buat Tes" jika sudah sesuai.<br><br>
                                    <img src="/assets/images/user-guide/create-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Sedangkan jika ingin melihat detail test yang anda buat, cukup tekan tombol "Lihat Tes" pada halaman dashboard test. Setelah itu, anda akan diarahkan ke halaman detail test seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/detail-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat melihat detail test yang telah anda buat sebelumnya. Anda juga dapat menambah soal pada tes serta mengedit tes tersebut.
                                    Untuk menambah pertanyaan pada test, anda hanya perlu menekan tombol "Tambah Soal" pada halaman detail test. Setelah itu, anda akan diarahkan ke halaman tambah pertanyaan seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/add-question.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat menambahkan pertanyaan yang diinginkan pada test yang telah anda buat sebelumnya. Anda dapat memilih pertanyaan yang telah anda buat sebelumnya pada halaman koleksi soal seperti berikut. <br><br>
                                    <img src="/assets/images/user-guide/select.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Jika sudah memilih, klik "Select" lalu "Selesai". <br><br>
                                    Anda juga dapat mmengedit test dengan menekan tombol "Edit" pada bagian atas, sehingga tampilan nya akan berubah menjadi form aktif seperti berikut <br><br>
                                    <img src="/assets/images/user-guide/edit-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Disini anda hanya perlu mengubah informasi yang dirasa belum sesuai. Jika sudah anda dapat menekan tombol "Simpan" untuk menyimpan perubahan yang telah anda lakukan. Ataupun menekan tombol "Batal" jika ingin membatalkannya. <br><br>
                                    Anda juga dapat menghapus test yang telah dibuat, dengan cara menekan tombol "Hapus" pada halaman dashboard test. Sebelum data terhapus, anda akan diberikan sebuah pop-up konfirmasi untuk menghapus test seperti berikut. Anda hanya perlu menekan tombol "Hapus" jika sudah yakin.<br><br>
                                    <img src="/assets/images/user-guide/delete-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>

                                </p>
                            </div>
                            @elseif ($_GET['code'] == "start-cbt")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Computer Based Test
                                    </b>
                                </h4>
                                <p>
                                    Untuk mengikuti ujian CBT, Anda bebas jika ingin masuk terlebih dahulu ke dalam sistem Smart Engtest ataupun tidak. Anda hanya perlu memilih menu CBT pada bagian navigasi bar atas seperti gambar di bawah ini. <br> <br>
                                    <img src="/assets/images/user-guide/navbar-sudah-login.png" alt="" width="100%"> <br><br>
                                    Ketika anda menekan tombol tersebut, maka anda akan diarahkan ke halaman CBT seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/cbt-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda hanya perlu menekan tombol "Mulai Tes" lalu sistem akan menampilkan form test yang akan diikuti seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/start-test.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah itu anda hanya perlu memasukan data sesuai test yang telah disediakan sebelumnya. Jika sudah, anda hanya perlu menekan tombol "Mulai Tes" untuk memulai test. Selanjutnya sistem akan menampilkan detail testseperti berikut, anda hanya perlu menekan "Mulai Tes".<br><br>
                                    <img src="/assets/images/user-guide/detail-test.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah itu, tes akan mulai seperti berikut <br><br>
                                    <img src="/assets/images/user-guide/cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "demo-generate")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara menggunakan fitur demo generate soal
                                    </b>
                                </h4>
                                <p>
                                    Untuk menggunakan fitur Demo, Anda tidak perlu masuk terlebih dahulu ke dalam sistem Smart Engtest. Anda dapat memilih menu "Demo" pada bagian navigasi bar atas seperti gambar di bawah ini. <br> <br>
                                    <img src="/assets/images/user-guide/navbar-login.png" alt="" width="100%"> <br><br>
                                    Ketika anda menekan tombol tersebut, maka anda akan diarahkan ke halaman dashboard demo seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat memilih apa yang ingin anda demo-kan. Jika anda ingin mendemokan fitur generate soal, maka anda harus menekan tombol "Demo Generate Soal".
                                    Sedangkan jika anda ingin mendemokan fitur koleksi soal, maka anda perlu menekan tombol "Demo Koleksi Soal". Lalu yang terakhir, jika ingin mendemokan fitur CBT, maka anda perlu menekan tombol "Demo CBT". <br><br>
                                    Jika anda kesulitan, kami telah menyediakan tombol bantuan pada bagian kanan bawah disetiap halaman demo. Anda hanya perlu meng-hover ke tombol bantuan tersebut, lalu sistem akan merekomendasikan langkah selanjutnya yang perlu anda lakukan. <br><br>
                                    Selanjutnya, jika anda ingin mendemokan fitur generate soal anda perlu menekan card "Demo Generate Soal". Ketika anda telah menekan card tersebut, maka anda akan diarahkan ke halaman demo generate soal seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-select-generator.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah itu, anda hanya bisa memilih tautan berita yang telah kami siapkan. Jika sudah memilih, anda hanya perlu menekan tombol "Generate" untuk melakukan Scrapping pada berita yang Anda masukan. <br><br>
                                    <img src="/assets/images/user-guide/demo-input-passage.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah sistem menerima input, sistem akan menampilkan hasil passage yang telah di-scrap, dan Anda dapat mengedit kalimat tersebut jika ingin. <br><br>
                                    <img src="/assets/images/user-guide/demo-preview-passage.png" alt="" class=" mx-auto d-block" width="100%"> <br>
                                    Jika sudah, Anda dapat menekan tombol "Generate", lalu sistem akan menampilkan soal-soal sesuai passage yang anda masukan seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-generate-result.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Setelah soal muncul, anda dapat melihat jawaban dari soal-soal tersebut dengan menekan tombol "Lihat Jawaban" pada bagian bawah soal. Dan anda dapat menyembunyikan jawabannya lagi dengan menekan tombol "Sembunyikan Jawaban" <br><br>
                                    <img src="/assets/images/user-guide/demo-show-answer.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Anda dapat menentukan soal mana saja yang ingin anda simpan ke dalam koleksi soal anda dengan mencentang soal-soal yang tersedia seperti berikut lalu tekan tombol simpan. <br><br>
                                    <img src="/assets/images/user-guide/demo-select-question.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada bagian ini, anda dapat mengedit soal-soal yang telah dibuat otomatis oleh sistem dengan cara menekan tombol edit pada halaman detail koleksi. Jika anda sudah selesai melakukan edit, anda hanya perlu menekan tombol "Simpan Perubahan", maka soal akan otomatis terupdate.<br><br>
                                    <img src="/assets/images/user-guide/demo-edit.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "demo-koleksi")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara menggunakan fitur demo melihat koleksi
                                    </b>
                                </h4>
                                <p>
                                    Untuk menggunakan fitur Demo, Anda tidak perlu masuk terlebih dahulu ke dalam sistem Smart Engtest. Anda dapat memilih menu "Demo" pada bagian navigasi bar atas seperti gambar di bawah ini. <br> <br>
                                    <img src="/assets/images/user-guide/navbar-login.png" alt="" width="100%"> <br><br>
                                    Ketika anda menekan tombol tersebut, maka anda akan diarahkan ke halaman dashboard demo seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat memilih apa yang ingin anda demo-kan. Jika anda ingin mendemokan fitur koleksi soal, maka anda harus menekan card "Demo Koleksi Soal".
                                    Berikut adalah tampilan jika anda menekan card "Demo Koleksi Soal" namun belum memiliki koleksi soal. Anda hanya perlu menekan tombol "Demo Generate sekarang" untuk menambah koleksi. <br><br>
                                    <img src="/assets/images/user-guide/demo-error-koleksi.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Namun, jika anda sudah memiliki koleksi soal, maka anda akan diarahkan ke halaman koleksi seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-koleksi.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Anda dapat melihat koleksi soal yang telah anda buat sebelumnya dengan cara menekan salah satu koleksi yang tersedia. Jika sudah menekannya, anda akan diarahkan menuju halaman detail koleksi seperti berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-detail-koleksi-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini anda dapat melihat detail koleksi soal yang telah anda buat sebelumnya. Anda dapat melihat detail soal, mengedit soal, menghapus soal, dan melihat jawaban soal.
                                    Jika anda menekan tombol hapus pada halaman detail koleksi, maka soal yang anda pilih akan terhapus dari koleksi soal anda. Sebelum data terhapus, anda akan diberikan sebuah pop-up konfirmasi untuk menghapus pertanyaan seperti berikut. Anda hanya perlu menekan tombol "Hapus" jika sudah yakin.<br><br>
                                    <img src="/assets/images/user-guide/demo-delete-collection.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Selain itu, anda juga dapat mengedit soal yang dihasilkan oleh dengan cara menekan tombol edit pada halaman detail koleksi. Jika anda sudah selesai melakukan edit, anda hanya perlu menekan tombol "Simpan Perubahan", maka soal akan otomatis terupdate.<br><br>
                                    <img src="/assets/images/user-guide/demo-update-collection.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                </p>
                            </div>
                            @elseif ($_GET['code'] == "demo-cbt")
                            <div class="row p-3">
                                <h4 class="pb-3 text-color-secondary">
                                    <b>
                                        Cara menggunakan fitur demo Computer Based Test
                                    </b>
                                </h4>
                                <p>
                                    Untuk menggunakan fitur Demo, Anda tidak perlu masuk terlebih dahulu ke dalam sistem Smart Engtest. Anda dapat memilih menu "Demo" pada bagian navigasi bar atas seperti gambar di bawah ini. <br> <br>
                                    <img src="/assets/images/user-guide/navbar-login.png" alt="" width="100%"> <br><br>
                                    Ketika anda menekan tombol tersebut, maka anda akan diarahkan ke halaman dashboard demo seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat memilih apa yang ingin anda demo-kan. Jika anda ingin mendemokan fitur CBT, maka anda harus menekan card "Demo CBT".
                                    Ketika anda menekan tombol tersebut, maka anda akan diarahkan ke halaman CBT seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-cbt-page.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat memilih apa yang ingin anda kerjakan. Jika anda ingin membuat test baru, maka anda harus menekan tombol Tes Dashboard. Sedangkan jika anda ingin mengikuti ujian, maka anda perlu menekan tombol Mulai Tes. <br><br>
                                    Jika anda ingin melihat dan membuat test baru, anda perlu menekan card "Test Dashboard". Ketika anda telah menekan tombol tersebut, maka anda akan diarahkan ke halaman dashboard test seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/demo-cbt-dashboard.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Untuk membuat test baru, anda hanya perlu menekan tombol "Buat tes sekarang". Setelah itu, anda akan diarahkan ke halaman pembuatan test seperti gambar berikut. Anda hanya perlu mengisi sesuai data valid, kemudian tekan tombol "Buat Tes" jika sudah sesuai.<br><br>
                                    <img src="/assets/images/user-guide/demo-create-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Sedangkan jika ingin melihat detail test yang anda buat, cukup tekan tombol "Lihat Ujian" pada halaman dashboard test. Setelah itu, anda akan diarahkan ke halaman detail test seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/detail-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat melihat detail test yang telah anda buat sebelumnya. Anda juga dapat menambah soal pada tes serta mengedit tes tersebut.
                                    Untuk menambah pertanyaan pada test, anda hanya perlu menekan tombol "Tambah Soal" pada halaman detail test. Setelah itu, anda akan diarahkan ke halaman tambah pertanyaan seperti gambar berikut. <br><br>
                                    <img src="/assets/images/user-guide/add-question.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Pada halaman ini, anda dapat menambahkan pertanyaan yang diinginkan pada test yang telah anda buat sebelumnya. Anda dapat memilih pertanyaan yang telah anda buat sebelumnya pada halaman koleksi soal seperti berikut. <br><br>
                                    <img src="/assets/images/user-guide/select.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Jika sudah memilih, klik "Select" lalu "Selesai". <br><br>
                                    Anda juga dapat mmengedit test dengan menekan tombol "Edit" pada bagian atas, sehingga tampilan nya akan berubah menjadi form aktif seperti berikut <br><br>
                                    <img src="/assets/images/user-guide/edit-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                    Disini anda hanya perlu mengubah informasi yang dirasa belum sesuai. Jika sudah anda dapat menekan tombol "Simpan" untuk menyimpan perubahan yang telah anda lakukan. Ataupun menekan tombol "Batal" jika ingin membatalkannya. <br><br>
                                    Anda juga dapat menghapus test yang telah dibuat, dengan cara menekan tombol "Hapus" pada halaman dashboard test. Sebelum data terhapus, anda akan diberikan sebuah pop-up konfirmasi untuk menghapus test seperti berikut. Anda hanya perlu menekan tombol "Hapus" jika sudah yakin.<br><br>
                                    <img src="/assets/images/user-guide/delete-cbt.png" alt="" class=" mx-auto d-block" width="100%"> <br><br>
                                </p>
                            </div>
                            @endif
                        </div>
                        @else
                        <h5>Panduan Pengguna</h5>
                        <p>Silahkan pilih panduan pengguna yang tersedia di tab bagian kiri jika menggunakan desktop maupun tablet. Sedangkan jika menggunakan smartphone, anda perlu menekan tombol panduan pengguna terlebih dahulu.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarBtn').on('click', function() {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
@endsection