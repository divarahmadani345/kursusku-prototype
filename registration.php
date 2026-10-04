<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Kursus - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- =========================
         HEADER
    ========================= -->

    <header class="site-header">

        <div class="container nav-wrap">

            <a class="brand" href="index.php">
                KursusKu
            </a>

            <nav aria-label="Navigasi utama">

                <a href="index.php">
                    Beranda
                </a>

                <a href="index.php#katalog">
                    Katalog
                </a>

                <a href="registration.php">
                    Daftar
                </a>

            </nav>

        </div>

    </header>


    <!-- =========================
         MAIN CONTENT
    ========================= -->

    <main class="container">

        <!-- INTRO -->

        <section class="page-intro">

            <p class="eyebrow">
                Pendaftaran Kursus
            </p>

            <h1>
                Mulai belajar bersama KursusKu
            </h1>

            <p>
                Gunakan data latihan. Field bertanda wajib harus diisi.
            </p>

        </section>


        <!-- =========================
             FORM PENDAFTARAN
        ========================= -->

        <section class="form-card">

            <form
                action="process-registration.php"
                method="POST"
                class="registration-form"
            >

                <input
                    type="hidden"
                    name="source"
                    value="week-05"
                >


                <!-- DATA PESERTA -->

                <div class="form-grid">

                    <div class="form-group">

                        <label for="name">
                            Nama Lengkap
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            minlength="3"
                            maxlength="100"
                            autocomplete="name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            maxlength="120"
                            autocomplete="email"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="phone">
                            Nomor HP
                        </label>

                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            maxlength="15"
                            autocomplete="tel"
                            placeholder="Contoh: 081234567890"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="study_program">
                            Program Studi
                        </label>

                        <input
                            id="study_program"
                            name="study_program"
                            type="text"
                            maxlength="100"
                            required
                        >

                    </div>

                </div>


                <!-- KURSUS -->

                <div class="form-group">

                    <label for="course">
                        Kursus yang Dipilih
                    </label>

                    <select id="course" name="course" required>
    <option value="">-- Pilih kursus --</option>
    <option value="web-dasar">Web Dasar</option>
    <option value="php-dasar">PHP Dasar</option>
    <option value="php-lanjutan">PHP Lanjutan</option>
    <option value="laravel-fundamental">Laravel Fundamental</option>
    <option value="mysql-dasar">MySQL Dasar</option>
    <option value="ui-web-dasar">UI Web Dasar</option>
</select>
                </div>


                <!-- JENIS PESERTA -->

                <fieldset class="form-group">

                    <legend>
                        Jenis Peserta
                    </legend>

                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="mahasiswa"
                            required
                        >

                        Mahasiswa

                    </label>


                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="umum"
                        >

                        Umum

                    </label>


                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="guru"
                        >

                        Guru

                    </label>

                </fieldset>


                <!-- MINAT TAMBAHAN -->

                <fieldset class="form-group">

                    <legend>
                        Minat Tambahan
                    </legend>

                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="ui-ux"
                        >

                        UI/UX

                    </label>


                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="database"
                        >

                        Database

                    </label>


                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="backend"
                        >

                        Backend

                    </label>


                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="frontend"
                        >

                        Frontend

                    </label>

                </fieldset>


                <!-- METODE BELAJAR & JUMLAH PAKET -->

                <div class="form-grid">

                    <div class="form-group">

                        <label for="learning_method">
                            Metode Belajar
                        </label>

                        <select
                            id="learning_method"
                            name="learning_method"
                            required
                        >

                            <option value="">
                                -- Pilih metode --
                            </option>

                            <option value="online">
                                Online
                            </option>

                            <option value="offline">
                                Offline
                            </option>

                            <option value="hybrid">
                                Hybrid (Online + Offline)
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label for="package_count">
                            Jumlah Paket
                        </label>

                        <select
                            id="package_count"
                            name="package_count"
                            required
                        >

                            <option value="1">
                                1 paket
                            </option>

                            <option value="2">
                                2 paket
                            </option>

                            <option value="3">
                                3 paket
                            </option>

                        </select>

                    </div>

                </div>


                <!-- CATATAN -->

                <div class="form-group">

                    <label for="note">
                        Catatan
                    </label>

                    <textarea
                        id="note"
                        name="note"
                        rows="5"
                        maxlength="300"
                        placeholder="Tuliskan kebutuhan belajar Anda (opsional)"
                    ></textarea>

                    <small class="help">
                        Maksimal 300 karakter.
                    </small>

                </div>


                <!-- TOMBOL -->

                <div class="form-actions">

                    <button 
                        class="btn-primary"
                        type="submit"
                    >
                        Proses Pendaftaran
                    </button>


                    <a
                        href="process-registration.php?history=dummy"
                        class="btn-link"
                    >
                        History Dummy
                    </a>


                    <a
                        href="process-registration.php?loop=lab"
                        class="btn-link"
                    >
                        Loop Lab
                    </a>

                </div>

            </form>

        </section>


       <section class="section">
    <div class="container">

        <h2 class="section-title">Fasilitas</h2>
        <p class="section-subtitle">Yang kamu dapatkan selama mengikuti kursus</p>

        <div class="facility-grid">

            <div class="facility-card">
                <div class="facility-icon">📚</div>
                <h3>Materi Pembelajaran</h3>
                <p>Materi kursus disusun secara bertahap dan mudah dipahami.</p>
            </div>

            <div class="facility-card">
                <div class="facility-icon">💻</div>
                <h3>Praktik Langsung</h3>
                <p>Peserta dapat melakukan praktik berdasarkan materi yang dipelajari.</p>
            </div>

            <div class="facility-card">
                <div class="facility-icon">🤝</div>
                <h3>Pendampingan</h3>
                <p>Peserta mendapatkan pendampingan selama proses pembelajaran.</p>
            </div>

            <div class="facility-card">
                <div class="facility-icon">🎓</div>
                <h3>Sertifikat</h3>
                <p>Peserta mendapatkan sertifikat setelah menyelesaikan kursus.</p>
            </div>

        </div>
    </div>
</section>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer class="footer">

        <div class="container">

            <p>
                &copy; <?= date('Y') ?> KursusKu
            </p>

        </div>

    </footer>

</body>

</html>

