<x-user-layout title="Dashboard Alumni">
<section class="hero-section" id="beranda">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="mb-4 display-4 fw-bold" data-aos="fade-right" data-aos-duration="800">Sistem Informasi Tracer Study Universitas Ahmad Dahlan</h1>
                    <p class="mb-4 lead" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">Menjembatani alumni dengan dunia kerja dan mengumpulkan data untuk pengembangan kualitas pendidikan</p>
                    <div class="flex-wrap gap-3 d-flex" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                        <a href="#" class="btn btn-warning btn-lg fw-bold pulse-animation">Daftar Sekarang</a>
                        <a href="#" class="btn btn-outline-light btn-lg">Login Alumni</a>
                    </div>
                </div>
                <div class="text-center col-lg-6">
                    <div class="p-4 mt-4 bg-light-blue rounded-3 mt-lg-0 hover-lift" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
                        {{-- <i class="mb-3 fas fa-graduation-cap display-1 text-primary-custom"></i> --}}
                        <img src="{{ asset('logo-tracer-study.png') }}"
                        style="width: auto; height: auto;"
                        class="rounded img-fluid" >
                        <h4 class="hero-section-custom">Platform Koneksi Alumni</h4>
                        <p class="text-muted">Bergabung dengan ribuan alumni UAD lainnya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="tentang">
        <div class="container">
            <div class="row">
                <div class="mx-auto mb-5 text-center col-lg-8" data-aos="fade-up">
                    <h2 class="mb-3 fw-bold">Apa Itu Tracer Study?</h2>
                    <p class="lead">Tracer Study adalah studi pelacakan jejak alumni untuk mengumpulkan data tentang transisi dari dunia pendidikan ke dunia kerja serta pengembangan karir alumni.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <i class="fas fa-bullseye feature-icon"></i>
                            <h5 class="card-title">Tujuan</h5>
                            <p class="card-text">Meningkatkan kualitas pendidikan dengan umpan balik dari alumni tentang relevansi kurikulum dengan dunia kerja.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <i class="fas fa-chart-line feature-icon"></i>
                            <h5 class="card-title">Manfaat</h5>
                            <p class="card-text">Data yang terkumpul membantu universitas dalam pengambilan keputusan strategis untuk peningkatan kualitas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <i class="fas fa-handshake feature-icon"></i>
                            <h5 class="card-title">Partisipasi</h5>
                            <p class="card-text">Kontribusi Anda sangat berharga untuk kemajuan almamater dan membantu adik-adik tingkat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light-blue">
        <div class="container">
            <div class="row">
                <div class="mx-auto mb-5 text-center col-lg-8" data-aos="fade-up">
                    <h2 class="mb-3 fw-bold">Fitur Utama Kami</h2>
                    <p class="lead">Akses penuh terbuka setelah login dan mengisi kuesioner</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="500">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="card-title">Tracer Study</h5>
                            <p class="card-text">Pengisian kuesioner tracer study dengan tampilan yang ramah dan interaktif.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="card-title">Forum Alumni</h5>
                            <p class="card-text">Diskusi dan berbagi pengalaman dengan sesama alumni Universitas Ahmad Dahlan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="card-title">Lowongan Kerja</h5>
                            <p class="card-text">Rekomendasi pekerjaan sesuai dengan bidang studi dan minat karir Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="card-title">Event & Seminar</h5>
                            <p class="card-text">Informasi acara kampus dan pengembangan karir untuk alumni.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="card-title">Mentorship</h5>
                            <p class="card-text">Konsultasi dengan para mentor untuk pengembangan karir dan bisnis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="600">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="step-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <h5 class="card-title">Leaderboard & Sistem Poin</h5>
                            <p class="card-text">Dapatkan pengakuan atas kontribusi dan partisipasi aktif Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="mx-auto mb-5 text-center col-lg-8" data-aos="fade-up">
                    <h2 class="mb-3 fw-bold">Alur Penggunaan Platform</h2>
                    <p class="lead">Fitur akan terbuka secara bertahap setelah menyelesaikan kuesioner</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="border-0 card bg-light-yellow h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="mb-3 text-white step-number bg-primary-custom rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">1</div>
                            <h5 class="card-title">Daftar Akun & Kuesioner 1</h5>
                            <p class="card-text">Isi data dasar dan kuesioner 1 untuk membuka fitur Leaderboard.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="border-0 card bg-light-yellow h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="mb-3 text-white step-number bg-primary-custom rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">2</div>
                            <h5 class="card-title">Kuesioner 2</h5>
                            <p class="card-text">Isi kuesioner bagian 2 untuk mengakses fitur forum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="border-0 card bg-light-yellow h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="mb-3 text-white step-number bg-primary-custom rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">3</div>
                            <h5 class="card-title">Kuesioner 3</h5>
                            <p class="card-text">Isi kuesioner bagian 3 untuk mengakses fitur mentorship untuk alumni.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="border-0 card bg-light-yellow h-100 hover-lift">
                        <div class="p-4 text-center card-body">
                            <div class="mb-3 text-white step-number bg-primary-custom rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">4</div>
                            <h5 class="card-title">Kuesioner 4</h5>
                            <p class="card-text">Isi kuesioner bagian 4 untuk mengakses penuh daftar rekomendasi lowongan pekerjaan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-white bg-primary-custom">
        <div class="container">
            <div class="text-center row">
                <div class="mb-4 col-md-3 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number stat-number-custom" data-count="5000">0</div>
                    <p class="mb-0">Alumni Terdaftar</p>
                </div>
                <div class="mb-4 col-md-3 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number stat-number-custom" data-count="85">0</div>
                    <p class="mb-0">Alumni Bekerja</p>
                </div>
                <div class="mb-4 col-md-3 mb-md-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number stat-number-custom" data-count="200">0</div>
                    <p class="mb-0">Lowongan Tersedia</p>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number stat-number-custom" data-count="50">0</div>
                    <p class="mb-0">Perusahaan Mitra</p>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="mx-auto mb-5 text-center col-lg-8" data-aos="fade-up">
                    <h2 class="mb-3 fw-bold">Testimoni Alumni</h2>
                    <p class="lead">Pengalaman alumni yang telah merasakan manfaat platform ini</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="100">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 card-body testimonial-card">
                            <p class="mb-3 card-text">"Melalui tracer study ini, saya bisa terhubung dengan banyak alumni dan mendapatkan referensi lowongan kerja yang sesuai dengan bidang saya."</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="text-white bg-primary-custom rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">A</div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Deny Iqbal</h6>
                                    <small class="text-muted">Teknik Informatika, 2018</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="200">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 card-body testimonial-card">
                            <p class="mb-3 card-text">"Forum alumni sangat membantu saya dalam berbagi pengalaman kerja dan mendapatkan saran karir dari senior yang sudah berpengalaman."</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="text-white bg-primary-custom rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">S</div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Siti Nurhaliza</h6>
                                    <small class="text-muted">Manajemen, 2019</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="flip-left" data-aos-delay="300">
                    <div class="border-0 shadow-sm card h-100 hover-lift">
                        <div class="p-4 card-body testimonial-card">
                            <p class="mb-3 card-text">"Sistem kuesioner bertahap membuat pengisian data tidak membosankan. Fitur yang terbuka secara bertahap juga memberikan motivasi untuk menyelesaikan semua kuesioner."</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="text-white bg-primary-custom rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">D</div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Dewi Sartika</h6>
                                    <small class="text-muted">Akuntansi, 2020</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="py-5 bg-light" id="faq">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8">
                    <h2 class="mb-5 text-center fw-bold" data-aos="fade-up">Pertanyaan Umum</h2>

                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1">
                                    Bagaimana cara mendaftar di platform Tracer Study?
                                </button>
                            </h2>
                            <div id="answer1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Klik tombol "Daftar" di bagian atas halaman, isi data diri Anda, dan verifikasi email. Setelah itu, Anda mulai mengisi kuesioner bagian 1 dan dapat melakukan Login Akun.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2">
                                    Apa manfaat mengisi kuesioner tracer study?
                                </button>
                            </h2>
                            <div id="answer2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Data yang Anda berikan membantu universitas meningkatkan kualitas pendidikan dan relevansi kurikulum. Selain itu, Anda juga mendapatkan akses ke fitur-fitur eksklusif seperti forum alumni, lowongan kerja, dan mentorship.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3">
                                    Apakah data pribadi saya aman?
                                </button>
                            </h2>
                            <div id="answer3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, data pribadi Anda dilindungi dan hanya digunakan untuk keperluan tracer study. Data akan dianalisis secara agregat dan tidak akan dibagikan kepada pihak ketiga tanpa izin.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-user-layout>
