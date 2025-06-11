<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $setting->meta_description }}">
    <title>Portofolio Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .sidebar {
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
        }

        .main-content {
            transition: all 0.3s ease;
        }

        .section {
            scroll-margin-top: 2rem;
        }

        .project-card:hover .project-overlay {
            opacity: 1;
        }

        .project-overlay {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -39px;
            top: 0;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: #3b82f6;
            border: 3px solid #dbeafe;
        }

        .timeline-container::before {
            content: '';
            position: absolute;
            left: -32px;
            top: 0;
            width: 2px;
            height: 100%;
            background-color: #dbeafe;
        }

        .whatsapp-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 40;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 400px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .slide {
            min-width: 100%;
            height: 100%;
        }

        .slide-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .slider-dot.active {
            background-color: white;
        }

        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .slider-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .prev-btn {
            left: 20px;
        }

        .next-btn {
            right: 20px;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="sidebar w-64 md:w-72 bg-gradient-to-b from-blue-700 to-blue-900 text-white shadow-xl">
            <div class="p-6">
                <div class="flex justify-center mb-6">
                    <div class="w-40 h-40 rounded-full bg-white p-1">
                        <div
                            class="w-full h-full rounded-full bg-blue-200 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('storage/' . $setting->avatar) }}" alt="">
                        </div>
                    </div>
                </div>
                <h1 class="text-xl font-bold text-center mb-1">{{ $setting->nama_lengkap }}</h1>
                @php
                    $pekerjaan = explode(';', $setting->pekerjaan);
                @endphp
                @foreach ($pekerjaan as $item)
                    <p class="text-blue-200 text-center text-sm">- {{ $item }}</p>
                @endforeach
                <p class="mb-8"></p>
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a href="#about"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-user w-6"></i>
                                <span>Tentang Saya</span>
                            </a>
                        </li>
                        <li>
                            <a href="#education"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-graduation-cap w-6"></i>
                                <span>Pendidikan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#certificate"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-certificate w-6"></i>
                                <span>Sertifikat</span>
                            </a>
                        </li>
                        <li>
                            <a href="#experience"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-briefcase w-6"></i>
                                <span>Pengalaman</span>
                            </a>
                        </li>
                        <li>
                            <a href="#portfolio"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-laptop-code w-6"></i>
                                <span>Portofolio</span>
                            </a>
                        </li>
                        <li>
                            <a href="#publications"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-book w-6"></i>
                                <span>Publikasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="#community"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-hands-helping w-6"></i>
                                <span>Pengabdian</span>
                            </a>
                        </li>
                        <li>
                            <a href="#contact"
                                class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-envelope w-6"></i>
                                <span>Kontak</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- <div class="absolute bottom-0 left-0 right-0 p-6">
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-blue-200 hover:text-white transition-colors">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition-colors">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition-colors">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition-colors">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div> --}}
        </aside>

        <!-- Mobile menu button -->
        <button id="menu-toggle"
            class="md:hidden fixed top-4 left-4 z-50 bg-blue-600 text-white p-2 rounded-lg shadow-lg">
            <i id="menu-icon" class="fas fa-bars"></i>
        </button>

        <!-- Main Content -->
        <main class="main-content flex-1 ml-0 md:ml-72 p-6 overflow-y-auto">
            {{--
            <div class="max-w-6xl mx-auto">
                <!-- Foto Slider -->
                <div class="slider-container rounded-lg shadow-lg mb-8">
                    <div class="slider" id="slider">
                        <div class="slide bg-blue-200">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Crect fill='%234299e1' width='800' height='400'/%3E%3Ctext x='400' y='200' font-family='Arial' font-size='32' fill='white' text-anchor='middle' alignment-baseline='middle'%3EFoto 1%3C/text%3E%3Ccircle cx='400' cy='150' r='80' fill='white' fill-opacity='0.2'/%3E%3Cpath d='M340 220 Q400 280 460 220' stroke='white' stroke-width='5' fill='none'/%3E%3C/svg%3E"
                                alt="Foto 1" class="slide-img">
                        </div>
                        <div class="slide bg-green-200">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Crect fill='%2348bb78' width='800' height='400'/%3E%3Ctext x='400' y='200' font-family='Arial' font-size='32' fill='white' text-anchor='middle' alignment-baseline='middle'%3EFoto 2%3C/text%3E%3Cpolygon points='350,120 450,120 400,220' fill='white' fill-opacity='0.2'/%3E%3Ccircle cx='400' cy='270' r='40' fill='white' fill-opacity='0.2'/%3E%3C/svg%3E"
                                alt="Foto 2" class="slide-img">
                        </div>
                        <div class="slide bg-red-200">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Crect fill='%23f56565' width='800' height='400'/%3E%3Ctext x='400' y='200' font-family='Arial' font-size='32' fill='white' text-anchor='middle' alignment-baseline='middle'%3EFoto 3%3C/text%3E%3Crect x='320' y='120' width='160' height='160' rx='20' fill='white' fill-opacity='0.2'/%3E%3C/svg%3E"
                                alt="Foto 3" class="slide-img">
                        </div>
                        <div class="slide bg-purple-200">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Crect fill='%23805ad5' width='800' height='400'/%3E%3Ctext x='400' y='200' font-family='Arial' font-size='32' fill='white' text-anchor='middle' alignment-baseline='middle'%3EFoto 4%3C/text%3E%3Ccircle cx='350' cy='150' r='50' fill='white' fill-opacity='0.2'/%3E%3Ccircle cx='450' cy='150' r='50' fill='white' fill-opacity='0.2'/%3E%3Crect x='350' y='220' width='100' height='60' rx='10' fill='white' fill-opacity='0.2'/%3E%3C/svg%3E"
                                alt="Foto 4" class="slide-img">
                        </div>
                        <div class="slide bg-yellow-200">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Crect fill='%23ecc94b' width='800' height='400'/%3E%3Ctext x='400' y='200' font-family='Arial' font-size='32' fill='white' text-anchor='middle' alignment-baseline='middle'%3EFoto 5%3C/text%3E%3Cpath d='M300,150 L500,150 L400,250 Z' fill='white' fill-opacity='0.2'/%3E%3C/svg%3E"
                                alt="Foto 5" class="slide-img">
                        </div>
                    </div>

                    <button class="slider-btn prev-btn" id="prevBtn">&#10094;</button>
                    <button class="slider-btn next-btn" id="nextBtn">&#10095;</button>

                    <div class="slider-nav" id="sliderNav"></div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const slider = document.getElementById('slider');
                    const prevBtn = document.getElementById('prevBtn');
                    const nextBtn = document.getElementById('nextBtn');
                    const sliderNav = document.getElementById('sliderNav');

                    let currentSlide = 0;
                    const slides = document.querySelectorAll('.slide');
                    const totalSlides = slides.length;

                    // Create navigation dots
                    for (let i = 0; i < totalSlides; i++) {
                        const dot = document.createElement('div');
                        dot.classList.add('slider-dot');
                        if (i === 0) dot.classList.add('active');
                        dot.addEventListener('click', () => goToSlide(i));
                        sliderNav.appendChild(dot);
                    }

                    // Update slider position
                    function updateSlider() {
                        slider.style.transform = `translateX(-${currentSlide * 100}%)`;

                        // Update active dot
                        document.querySelectorAll('.slider-dot').forEach((dot, index) => {
                            if (index === currentSlide) {
                                dot.classList.add('active');
                            } else {
                                dot.classList.remove('active');
                            }
                        });
                    }

                    // Go to specific slide
                    function goToSlide(slideIndex) {
                        currentSlide = slideIndex;
                        updateSlider();
                    }

                    // Next slide
                    function nextSlide() {
                        currentSlide = (currentSlide + 1) % totalSlides;
                        updateSlider();
                    }

                    // Previous slide
                    function prevSlide() {
                        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                        updateSlider();
                    }

                    // Event listeners
                    nextBtn.addEventListener('click', nextSlide);
                    prevBtn.addEventListener('click', prevSlide);

                    // Auto slide (optional)
                    let slideInterval = setInterval(nextSlide, 5000);

                    // Pause auto slide on hover
                    const sliderContainer = document.querySelector('.slider-container');
                    sliderContainer.addEventListener('mouseenter', () => {
                        clearInterval(slideInterval);
                    });

                    sliderContainer.addEventListener('mouseleave', () => {
                        slideInterval = setInterval(nextSlide, 5000);
                    });
                });
            </script>
            <script>
                (function() {
                    function c() {
                        var b = a.contentDocument || a.contentWindow.document;
                        if (b) {
                            var d = b.createElement('script');
                            d.innerHTML = "window.__CF$cv$params={r:'94cfda8f10ae8796',t:'MTc0OTQ2Mzk3OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
            </script> --}}

            <!-- About Section -->
            <section id="about" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Tentang Saya</h2>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 mb-4">
                        <p class="text-gray-600 mb-4 text-justify leading-relaxed break-words">
                            Saya adalah seorang web developer, mobile android (flutter) developer, dosen, dan tenaga ahli IT dengan pengalaman lebih dari 5 tahun. Keahlian saya berfokus pada pengembangan sistem informasi berbasis web, sistem informasi manajemen kepegawaian, aplikasi mobile Android dan juga dapat menyesuaikan kebutuhan klien.
                        </p>
                        <p class="text-gray-600 mb-4 text-justify leading-relaxed break-words">
                            Saya memiliki semangat untuk mempelajari teknologi baru dan berkomitmen mengimplementasikannya
                            dalam proyek-proyek saya kerjakan. Saat ini, saya sedang mendalami tentang sistem tertanam (<em>embedded systems</em>), <em>Internet Of Things</em> (IoT) serta pengembangan website dan aplikasi android yang memanfaatkan penggunaan dari <em>artificial intelligence</em> (AI).
                        </p>
                        <p class="text-gray-600 mb-4 text-justify leading-relaxed break-words">
                            Sebagai seorang dosen, saya aktif menjalankan Tri Dharma Perguruan Tinggi, yakni pendidikan, penelitian, dan pengabdian kepada masyarakat. Saya yakin bahwa peran akademisi sangat penting dalam menjembatani teori dan praktik teknologi di lapangan.
                        </p>
                        <p class="text-gray-600 mb-4 text-justify leading-relaxed break-words">
                            Saya juga percaya bahwa kolaborasi dan komunikasi yang baik adalah kunci keberhasilan dalam
                            setiap proyek.
                        </p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pribadi</h3>
                        <table class="w-full">
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Nama Lengkap</td>
                                <td class="text-gray-600">: {{ $setting->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Panggilan</td>
                                <td class="text-gray-600">: {{ $setting->panggilan }}</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Email Pribadi</td>
                                <td class="text-gray-600">: <a href="mailto:{{ $setting->email_pribadi }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500">{{ $setting->email_pribadi }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Email Kantor</td>
                                <td class="text-gray-600">: <a href="mailto:{{ $setting->email_kantor }}" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500">{{ $setting->email_kantor }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">No. HP/WA</td>
                                <td class="text-gray-600">: {{ $setting->no_hp_wa }}</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Alamat</td>
                                <td class="text-gray-600">: {{ $setting->alamat }}</td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Website</td>
                                <td class="text-gray-600">: <a href="{{ $setting->website }}" target="_blank" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500">{{ $setting->website }}</a></td>
                            </tr>
                            <tr>
                                <td class="font-medium text-gray-700 pb-2">Profil Sinta</td>
                                <td class="text-gray-600">: <a href="{{ $setting->sinta }}" target="_blank" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500">Buka Profil Sinta</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Keahlian</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-blue-50 rounded-lg p-4 text-center">
                                <div class="text-blue-600 mb-2">
                                    <i class="fab fa-html5 fa-2x"></i>
                                </div>
                                <h4 class="font-medium">HTML/CSS</h4>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4 text-center">
                                <div class="text-blue-600 mb-2">
                                    <i class="fab fa-js fa-2x"></i>
                                </div>
                                <h4 class="font-medium">JavaScript</h4>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4 text-center">
                                <div class="text-blue-600 mb-2">
                                    <i class="fa-brands fa-php fa-2x"></i>
                                </div>
                                <h4 class="font-medium">PHP</h4>
                            </div>
                            <div class="bg-blue-50 rounded-lg p-4 text-center">
                                <div class="text-blue-600 mb-2">
                                    <i class="fa-brands fa-flutter fa-2x"></i>
                                </div>
                                <h4 class="font-medium">Flutter</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Education Section -->
            <section id="education" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-graduation-cap text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Pendidikan</h2>
                    </div>

                    <div class="relative timeline-container pl-10">
                        @foreach ($list_pendidikan as $item)
                            <div class="timeline-item relative pb-5">
                                <div class="bg-blue-50 rounded-lg p-6">
                                    <div class="flex justify-between mb-2">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->jenjang }} {{ $item->jurusan != '' ? ' - ' . $item->jurusan : '' }}</h3>
                                        <span class="text-blue-600 font-medium">{{ $item->tahun_masuk }} - {{ $item->tahun_lulus }}</span>
                                    </div>
                                    <h4 class="text-gray-600">{{ $item->sekolah_universitas }}</h4>
                                </div>
                            </div>
                        @endforeach
                        {{--
                        <div class="timeline-item relative pb-8">
                            <div class="bg-blue-50 rounded-lg p-6">
                                <div class="flex justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800">Sarjana Teknik Informatika</h3>
                                    <span class="text-blue-600 font-medium">2011 - 2015</span>
                                </div>
                                <h4 class="text-gray-600 mb-3">Institut Teknologi Bandung</h4>
                                <p class="text-gray-600">
                                    Mempelajari dasar-dasar ilmu komputer, algoritma, struktur data, dan pengembangan
                                    perangkat lunak.
                                    Skripsi: "Implementasi Machine Learning untuk Sistem Rekomendasi Produk E-commerce".
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item relative">
                            <div class="bg-blue-50 rounded-lg p-6">
                                <div class="flex justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800">SMA Negeri 1 Jakarta</h3>
                                    <span class="text-blue-600 font-medium">2008 - 2011</span>
                                </div>
                                <h4 class="text-gray-600 mb-3">Jurusan IPA</h4>
                                <p class="text-gray-600">
                                    Aktif dalam klub komputer dan robotika. Memenangkan beberapa kompetisi tingkat
                                    nasional
                                    dalam bidang pemrograman.
                                </p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>

            <!-- certificate Section -->
            <section id="certificate" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-certificate text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Sertifikat</h2>
                    </div>

                    <div class="relative timeline-container pl-10">
                        @foreach ($list_sertifikasi as $item)
                            <div class="timeline-item relative pb-8">
                                <div class="bg-blue-50 rounded-lg p-6">
                                    <div class="flex justify-between mb-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
                                        <span class="text-blue-600 font-medium">{{ $item->tahun_terbit }} - {{ (string) $item->tahun_kadaluarsa == '' ? 'Sekarang' : $item->tahun_kadaluarsa }}</span>
                                    </div>
                                    <h4 class="text-gray-600">No. {{ $item->nomor }}</h4>
                                    <h4 class="text-gray-600"><em>{{ $item->penerbit }}</em></h4>
                                    <h4 class="text-gray-600 mb-3">{{ $item->bidang }}</h4>
                                    {{-- <div class="flex flex-wrap gap-2">
                                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">React</span>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Node.js</span>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">GraphQL</span>
                                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">AWS</span>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Experience Section -->
            <section id="experience" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-briefcase text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Pengalaman Kerja</h2>
                    </div>

                    <div class="relative timeline-container pl-10">
                        @foreach ($list_pengalaman_kerja as $item)
                            <div class="timeline-item relative pb-8">
                                <div class="bg-blue-50 rounded-lg p-6">
                                    <div class="flex justify-between mb-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->jabatan }}</h3>
                                        <span class="text-blue-600 font-medium">{{ $item->tahun_masuk }} - {{ (string) $item->tahun_keluar == '' ? 'Sekarang' : $item->tahun_keluar }}</span>
                                    </div>
                                    <h4 class="text-gray-600"><em>{{ $item->perusahaan }}</em></h4>
                                    <h4 class="text-gray-600 mb-3"><a href="{{ $item->website }}" target="_blank" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500">{{ $item->website }}</a></h4>
                                    @php
                                        $deskripsi = explode(';', $item->deskripsi);
                                    @endphp
                                    <ul class="list-disc pl-5 text-gray-600 mb-3">
                                        @foreach ($deskripsi as $des)
                                            <li>{{ $des }}</li>
                                        @endforeach
                                    </ul>
                                    {{-- <div class="flex flex-wrap gap-2">
                                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">React</span>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">Node.js</span>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">GraphQL</span>
                                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">AWS</span>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Portfolio Section -->
            <section id="portfolio" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-laptop-code text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Portofolio</h2>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($list_portfolio as $item)
                            <!-- Item Project -->
                            <div class="project-card relative rounded-xl overflow-hidden shadow-md">
                                <div class="bg-gradient-to-br from-blue-400 to-blue-500 h-55 flex items-center justify-center">
                                    @php
                                        $thumb = explode('.', $item->path_gambar);
                                        $thumb = $thumb[0] . '-thumb.' . end($thumb);
                                    @endphp
                                    <img src="{{ asset('storage/' . $thumb) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover" loading="lazy">
                                </div>
                                <div class="p-4 bg-white">
                                    <h5 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h5>
                                    <p class="text-gray-600 text-sm mt-1">{{ $item->deskripsi_singkat }}</p>
                                </div>
                                <div
                                    class="project-overlay absolute inset-0 bg-blue-900 bg-opacity-90 flex items-center justify-center p-6">
                                    <div class="text-center">
                                        <h3 class="text-lg font-semibold text-white mb-2">{{ $item->nama }}</h3>
                                        <p class="text-blue-100 text-sm mb-4 text-justify">{{ $item->deskripsi_singkat }}</p>
                                        {{-- <a href="#"
                                            class="inline-block bg-white text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition-colors">Lihat
                                            Detail</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Publications Section -->
            <section id="publications" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-book text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Publikasi</h2>
                    </div>

                    <div class="space-y-6">
                        @foreach ($list_publikasi as $item)
                            <div class="bg-blue-50 rounded-lg p-6">
                                <div class="flex justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $item->judul }}</h3>
                                    <span class="text-blue-600 font-medium">{{ $item->tahun }}</span>
                                </div>
                                <h4 class="text-gray-600 mb-3"><em>{{ $item->penerbit }}</em></h4>
                                <p class="text-gray-600 mb-4">{{ $item->deskripsi }}</p>
                                <a href="{{ $item->url }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                    <span>Baca Publikasi</span>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Community Service Section -->
            <section id="community" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-hands-helping text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Pengabdian Masyarakat</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($list_pengabdian as $item)
                            <div class="bg-blue-50 rounded-lg p-6">
                                <div class="flex justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama_pengabdian }}</h3>
                                    <span class="text-blue-600 font-medium">{{ $item->tahun }}</span>
                                </div>
                                <h4 class="text-gray-600 mb-3"><em>{{ $item->lembaga }}</em></h4>
                                <p class="text-gray-600">{{ $item->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section id="contact" class="section mb-16">
                <div class="bg-white rounded-xl shadow-md p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Kontak</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <p class="text-gray-600 mb-6">
                                Jika Anda tertarik untuk berkolaborasi atau memiliki pertanyaan, jangan ragu untuk
                                menghubungi saya
                                melalui salah satu platform di bawah ini atau mengisi formulir kontak.
                            </p>

                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Email Pribadi</h3>
                                        <p class="text-gray-600">{{ $setting->email_pribadi }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Email Kantor</h3>
                                        <p class="text-gray-600">{{ $setting->email_kantor }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <i class="fas fa-phone text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">No. HP/WA</h3>
                                        <p class="text-gray-600">{{ $setting->no_hp_wa }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                                        <i class="fas fa-map-marker-alt text-blue-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Lokasi</h3>
                                        <p class="text-gray-600">{{ $setting->alamat }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flex space-x-4">
                                    <a href="https://id.linkedin.com/in/ahmad-husna-ahadi-12b685231?trk=public_profile_samename-profile" target="_blank"
                                        class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://github.com/husna3305" target="_blank"
                                        class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-white hover:bg-gray-900 transition-colors">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a href="https://x.com/ahmad_husna_a" target="_blank"
                                        class="w-10 h-10 rounded-full bg-blue-400 flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                                        <i class="fab fa-x"></i>
                                    </a>
                                    <a href="https://www.instagram.com/ahmad_husna_ahadi/" target="_blank"
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-600 to-pink-500 flex items-center justify-center text-white hover:from-purple-700 hover:to-pink-600 transition-colors">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://www.facebook.com/husna.jowo/" target="_blank"
                                        class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="{{ route('cv') }}" target="_blank"
                                        class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white hover:bg-indigo-700 transition-colors">
                                        CV
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="bg-blue-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kirim Pesan</h3>
                            <form class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                    <input type="text" id="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                                        placeholder="Nama Anda">
                                </div>

                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" id="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                                        placeholder="email@example.com">
                                </div>

                                <div>
                                    <label for="subject"
                                        class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                                    <input type="text" id="subject"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                                        placeholder="Subjek pesan">
                                </div>

                                <div>
                                    <label for="message"
                                        class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                                    <textarea id="message" rows="4"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-colors"
                                        placeholder="Tulis pesan Anda di sini..."></textarea>
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors" disabled>Kirim
                                    Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="text-center text-gray-600 py-6">
                <p>&copy; {{ date('Y') }} Ahmad Husna Ahadi. All rights reserved.</p>
            </footer>
        </main>
    </div>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/6282282535844" target="_blank" rel="noopener noreferrer"
        class="whatsapp-button bg-green-500 hover:bg-green-600 w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition-colors">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const menuIcon = document.getElementById('menu-icon');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');

            if (sidebar.classList.contains('active')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Close mobile menu if open
                if (window.innerWidth < 768) {
                    sidebar.classList.remove('active');
                    menuIcon.classList.remove('fa-times');
                    menuIcon.classList.add('fa-bars');
                }

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            });
        });

        // Active section highlighting
        const sections = document.querySelectorAll('.section');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;

                if (pageYOffset >= sectionTop - 200) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('bg-blue-600');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('bg-blue-600');
                }
            });
        });

        // Form submission (demo)
        const contactForm = document.querySelector('form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // alert('Pesan telah dikirim! (Demo)');
                this.reset();
            });
        }
    </script>
    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML = "window.__CF$cv$params={r:'94cf88996524797a',t:'MTc0OTQ2MDYyMi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
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
