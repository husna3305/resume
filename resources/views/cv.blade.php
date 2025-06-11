<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $setting->nama_lengkap }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cv-container {
            display: flex;
            flex-direction: row;
            gap: 30px;
        }

        .sidebar {
            width: 30%;
        }

        .main-content {
            width: 70%;
        }

        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2563eb;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid #2563eb;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #2563eb;
            overflow: hidden;
            margin-right: 20px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .profile-title {
            font-size: 16px;
            color: #2563eb;
            font-weight: 500;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-icon {
            width: 20px;
            margin-right: 10px;
            color: #2563eb;
            text-align: center;
        }

        .skill-item {
            margin-bottom: 10px;
        }

        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .skill-bar {
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
        }

        .skill-progress {
            height: 100%;
            border-radius: 4px;
            background-color: #2563eb;
        }

        .timeline-item {
            margin-bottom: 20px;
            position: relative;
            padding-left: 20px;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 8px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #2563eb;
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .timeline-title {
            font-weight: 600;
            font-size: 16px;
        }

        .timeline-period {
            color: #2563eb;
            font-weight: 500;
            font-size: 14px;
        }

        .timeline-subtitle {
            font-weight: 500;
            color: #4b5563;
            margin-bottom: 5px;
        }

        .timeline-content {
            color: #6b7280;
            font-size: 14px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 15px;
        }

        .portfolio-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
        }

        .portfolio-image {
            height: 120px;
            background-color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .portfolio-content {
            padding: 10px;
        }

        .portfolio-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .portfolio-description {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .tag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .tag {
            background-color: #e0e7ff;
            color: #4338ca;
            font-size: 11px;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .publication-item {
            margin-bottom: 15px;
            padding-left: 15px;
            border-left: 3px solid #2563eb;
        }

        .publication-title {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .publication-source {
            font-size: 14px;
            color: #4b5563;
            margin-bottom: 3px;
        }

        .publication-description {
            font-size: 13px;
            color: #6b7280;
        }

        .service-item {
            display: flex;
            margin-bottom: 15px;
        }

        .service-icon {
            width: 40px;
            height: 40px;
            background-color: #e0e7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .service-content {
            flex-grow: 1;
        }

        .service-title {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .service-period {
            font-size: 14px;
            color: #4b5563;
            margin-bottom: 3px;
        }

        .service-description {
            font-size: 13px;
            color: #6b7280;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .social-link {
            color: #2563eb;
            font-size: 18px;
        }

        /* Certificate styles */
        .certificate-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 15px;
        }

        .certificate-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9fafb;
            display: flex;
            flex-direction: column;
        }

        .certificate-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .certificate-icon {
            width: 40px;
            height: 40px;
            background-color: #dbeafe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .certificate-title {
            font-weight: 600;
            font-size: 15px;
            color: #1f2937;
        }

        .certificate-issuer {
            font-size: 13px;
            color: #4b5563;
            margin-bottom: 5px;
        }

        .certificate-date {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .certificate-description {
            font-size: 12px;
            color: #6b7280;
            margin-top: auto;
        }

        .certificate-credential {
            margin-top: 8px;
            font-size: 12px;
            color: #2563eb;
            display: flex;
            align-items: center;
        }

        .certificate-credential i {
            margin-right: 5px;
            font-size: 10px;
        }

        /* Print-specific styles */
        @media print {
            body {
                font-size: 12px;
                line-height: 1.5;
            }

            .container {
                padding: 0;
                width: 100%;
                max-width: 100%;
            }

            .section {
                margin-bottom: 15px;
            }

            .section-title {
                font-size: 16px;
                margin-bottom: 10px;
            }

            .profile-image {
                width: 100px;
                height: 100px;
            }

            .profile-name h1 {
                font-size: 24px;
            }

            .timeline-item {
                margin-bottom: 12px;
            }

            .portfolio-image {
                height: 80px;
            }

            .no-print {
                display: none !important;
            }

            a {
                text-decoration: none;
                color: inherit;
            }

            .page-break {
                page-break-before: always;
            }

            .certificate-grid {
                grid-template-columns: repeat(1, 1fr);
            }

            .certificate-item {
                padding: 10px;
            }

            .certificate-icon {
                width: 30px;
                height: 30px;
            }
        }

        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="cv-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Profile Section -->
                <div class="section">
                    <div class="profile-header">
                        <div class="profile-image">
                            <img src="{{ asset('storage/' . $setting->avatar) }}" alt="Profile Image">
                        </div>
                        <div class="profile-name">
                            <h3>{{ $setting->nama_lengkap }}</h3>
                            @php
                                $pekerjaan = explode(';', $setting->pekerjaan);
                            @endphp
                            <ul style="margin-left: 15px">
                                @foreach ($pekerjaan as $item)
                                    <li class="profile-title" style="font-size: 10pt">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="section">
                    <h2 class="section-title">Kontak</h2>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>- {{ $setting->email_pribadi }} <br> - {{ $setting->email_kantor }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>{{ $setting->no_hp_wa }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>{{ $setting->alamat }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div>{{ $setting->website }}</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-linkedin"></i>
                        </div>
                        <div>Ahmad Husna Ahadi</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-x"></i>
                        </div>
                        <div>Ahmad Husna Ahadi</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div>@ahmad_husna_ahadi</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-github"></i>
                        </div>
                        <div>https://github.com/husna3305</div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div>Ahmad Husna Ahadi</div>
                    </div>
                </div>

                <!-- About Me -->
                <div class="section">
                    <h2 class="section-title">Tentang Saya</h2>
                    <p class="text-justify">Saya adalah seorang web developer, mobile android (flutter) developer, dosen, dan tenaga ahli IT dengan pengalaman lebih dari 5 tahun. Keahlian saya berfokus pada pengembangan sistem informasi berbasis web, sistem informasi manajemen kepegawaian, aplikasi mobile Android dan juga dapat menyesuaikan kebutuhan klien.</p>
                    <p class="text-justify">Saya memiliki semangat untuk mempelajari teknologi baru dan berkomitmen mengimplementasikannya dalam proyek-proyek saya kerjakan. Saat ini, saya sedang mendalami tentang sistem tertanam (embedded systems), Internet Of Things (IoT) serta pengembangan website dan aplikasi android yang memanfaatkan penggunaan dari artificial intelligence (AI).</p>
                    <p class="text-justify">Sebagai seorang dosen, saya aktif menjalankan Tri Dharma Perguruan Tinggi, yakni pendidikan, penelitian, dan pengabdian kepada masyarakat. Saya yakin bahwa peran akademisi sangat penting dalam menjembatani teori dan praktik teknologi di lapangan.</p>
                    <p class="text-justify">Saya juga percaya bahwa kolaborasi dan komunikasi yang baik adalah kunci keberhasilan dalam setiap proyek.</p>
                </div>

                <!-- Skills -->
                <div class="section">
                    <h2 class="section-title">Keahlian</h2>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>HTML/CSS</span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>JavaScript</span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>PHP</span>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-name">
                            <span>Flutter</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Education Section -->
                <div class="section">
                    <h2 class="section-title">Pendidikan</h2>
                    @foreach ($list_pendidikan as $item)
                        <div class="timeline-item">
                            <div class="timeline-header">
                                <div class="timeline-title">{{ $item->jenjang }} {{ $item->jurusan != '' ? ' - ' . $item->jurusan : '' }}</div>
                                <div class="timeline-period">{{ $item->tahun_masuk }} - {{ $item->tahun_lulus }}</div>
                            </div>
                            <div class="timeline-subtitle">{{ $item->sekolah_universitas }}</div>
                        </div>
                    @endforeach
                </div>

                <!-- Certificates Section -->
                <div class="section">
                    <h2 class="section-title">Sertifikat</h2>
                    <div class="certificate-grid">
                        <!-- Certificate 1 -->
                        @foreach ($list_sertifikasi as $item)
                            <div class="certificate-item">
                                <div class="certificate-header">
                                    <div class="certificate-icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div class="certificate-title">{{ $item->nama }}</div>
                                </div>
                                <div class="certificate-issuer"><em>{{ $item->penerbit }}</em></div>
                                <div class="certificate-date">Diterbitkan: {{ $item->tahun_terbit }} - {{ (string) $item->tahun_kadaluarsa == '' ? 'Sekarang' : $item->tahun_kadaluarsa }}</div>
                                <div class="certificate-credential">
                                    <i class="fas fa-link"></i> No. {{ $item->nomor }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Work Experience Section -->
                <div class="section page-break">
                    <h2 class="section-title">Pengalaman Kerja</h2>
                    @foreach ($list_pengalaman_kerja as $item)
                        <div class="timeline-item">
                            <div class="timeline-header">
                                <div class="timeline-title">{{ $item->jabatan }}</div>
                                <div class="timeline-period">{{ $item->tahun_masuk }} - {{ (string) $item->tahun_keluar == '' ? 'Sekarang' : $item->tahun_keluar }}</div>
                            </div>
                            <div class="timeline-subtitle"><em>{{ $item->perusahaan }}</em></div>
                            <div class="timeline-content">
                                @php
                                    $deskripsi = explode(';', $item->deskripsi);
                                @endphp
                                <ul style="padding-left: 15px; margin-top: 5px;">
                                    @foreach ($deskripsi as $des)
                                        <li>{{ $des }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Portfolio Section -->
                <div class="section">
                    <h2 class="section-title">Portofolio</h2>
                    <div class="portfolio-grid">
                        @foreach ($list_portfolio as $item)
                            <div class="portfolio-item">
                                <div class="portfolio-content">
                                    <div class="portfolio-title">{{ $item->nama }}</div>
                                    <div class="portfolio-description">{{ $item->deskripsi_singkat }}</div>
                                    {{-- <div class="tag-container">
                                        <span class="tag">HTML/CSS</span>
                                        <span class="tag">JavaScript</span>
                                        <span class="tag">UI/UX</span>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Publications Section -->
                <div class="section page-break">
                    <h2 class="section-title">Publikasi</h2>
                    @foreach ($list_publikasi as $item)
                        <div class="publication-item">
                            <div class="publication-title">{{ $item->judul }}</div>
                            <div class="publication-source">{{ $item->penerbit }}. Tahun : {{ $item->tahun }}</div>
                            <div class="publication-description">Penelitian tentang bagaimana elemen desain visual mempengaruhi keputusan pembelian dan pengalaman pengguna dalam platform e-commerce.</div>
                        </div>
                    @endforeach
                </div>

                <!-- Community Service Section -->
                <div class="section">
                    <h2 class="section-title">Pengabdian Masyarakat</h2>
                    @foreach ($list_pengabdian as $item)
                        <div class="service-item">
                            <div class="service-content">
                                <div class="service-title">{{ $item->nama_pengabdian }}</div>
                                <div class="service-description"><strong>{{ $item->lembaga }}. Tahun : {{ $item->tahun }}</strong></div>
                                <div class="service-description">{{ $item->deskripsi }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Print button - only visible on screen -->
    <div class="no-print" style="text-align: center; margin: 30px 0;">
        <button onclick="window.print()" style="background-color: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-weight: 500;">
            <i class="fas fa-print" style="margin-right: 8px;"></i> Cetak CV
        </button>
    </div>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'94d00ea47677ce8a',t:'MTc0OTQ2NjExMy4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
</body>

</html>
