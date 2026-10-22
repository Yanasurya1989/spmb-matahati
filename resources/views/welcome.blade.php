
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Festival Akbar PPDAMDG 2026</title>

    <style>
        /* =========================
           1. PENGATURAN DASAR
        ========================= */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(
                180deg,
                #dff3f4,
                #eef8f9
            );
            color: #202b3a;
        }

        /* =========================
           2. BAGIAN UTAMA
        ========================= */

        .container {
            width: 100%;
            max-width: 620px;
            margin: 0 auto;
            padding: 28px 16px 20px;
        }

        /* =========================
           3. JUDUL DAN SUBJUDUL
        ========================= */

        .header {
            text-align: center;
            margin-bottom: 38px;
        }

        .header h1 {
            margin: 0 0 10px;
            font-size: 29px;
            font-weight: 700;
            line-height: 1.25;
        }

        .header p {
            margin: 0;
            color: #5d6672;
            font-size: 17px;
            line-height: 1.5;
        }

        /* =========================
           4. DAFTAR TAUTAN
        ========================= */

        .link-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .link-item {
            display: flex;
            align-items: stretch;
            gap: 10px;
            min-width: 0;
        }

        /* Tombol utama */

        .main-link {
            display: flex;
            align-items: center;
            gap: 18px;
            flex: 1;
            min-width: 0;
            min-height: 75px;
            padding: 16px 24px;
            border-radius: 17px;

            background-color: #0c9da3;
            color: #ffffff;
            text-decoration: none;

            font-size: 18px;
            font-weight: 700;

            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.12);

            transition:
                background-color 0.2s,
                transform 0.2s,
                box-shadow 0.2s;
        }

        .main-link:hover {
            background-color: #087f85;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .main-link:active {
            transform: scale(0.98);
        }

        /* Ikon di sebelah kiri */

        .link-icon {
            flex-shrink: 0;
            width: 28px;
            text-align: center;
            font-size: 23px;
        }

        /* Nama tautan */

        .link-title {
            flex: 1;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        /* Ikon download */

        .download-icon {
            flex-shrink: 0;
            font-size: 14px;
            margin-left: auto;
        }

        /* =========================
           5. TOMBOL SHARE
        ========================= */

        .share-button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;

            width: 60px;
            min-height: 75px;

            border: none;
            border-radius: 17px;
            background-color: #ffffff;
            color: #515b67;

            cursor: pointer;

            box-shadow: 0 4px 7px rgba(0, 0, 0, 0.12);

            transition:
                background-color 0.2s,
                transform 0.2s;
        }

        .share-button:hover {
            background-color: #f0f3f5;
            transform: translateY(-2px);
        }

        .share-button svg {
            width: 25px;
            height: 25px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* =========================
           6. FOOTER
        ========================= */

        .footer {
            margin-top: 27px;
            text-align: center;
        }

        .footer a {
            color: #5d6672;
            font-size: 14px;
            line-height: 1.6;
            text-decoration: underline;
        }

        .footer a:hover {
            color: #087f85;
        }

        /* =========================
           7. TAMPILAN HP
        ========================= */

        @media (max-width: 480px) {
            .container {
                padding: 25px 13px 20px;
            }

            .header {
                margin-bottom: 30px;
            }

            .header h1 {
                font-size: 25px;
            }

            .header p {
                font-size: 15px;
            }

            .link-list {
                gap: 13px;
            }

            .link-item {
                gap: 9px;
            }

            .main-link {
                min-height: 68px;
                padding: 13px 15px;
                gap: 12px;
                border-radius: 15px;
                font-size: 15px;
            }

            .link-icon {
                width: 22px;
                font-size: 20px;
            }

            .share-button {
                width: 53px;
                min-height: 68px;
                border-radius: 15px;
            }

            .share-button svg {
                width: 23px;
                height: 23px;
            }
        }
    </style>
</head>

<body>

    <main class="container">

        <!-- JUDUL HALAMAN -->
        <header class="header">
            <h1>Festival Akbar PPDAMDG 2026</h1>

            <p>
                Ajang Kreasi Bakat Antar Pelajar<br>
                Tingkat SD/MI/Sederajat Se- Jawa Barat
            </p>
        </header>

        <!-- DAFTAR TAUTAN -->
        <section class="link-list">

            <!-- 1. LINK PENDAFTARAN -->
            <div class="link-item">

                <a
                    href="https://forms.gle/GANTI_LINK_PENDAFTARAN"
                    class="main-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-title="Link Pendaftaran"
                >
                    <span class="link-icon">🔗</span>
                    <span class="link-title">Link Pendaftaran</span>
                </a>

                <button
                    class="share-button"
                    type="button"
                    aria-label="Bagikan Link Pendaftaran"
                    title="Bagikan tautan"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <path d="M8.7 10.7l6.6-4.4"></path>
                        <path d="M8.7 13.3l6.6 4.4"></path>
                    </svg>
                </button>

            </div>

            <!-- 2. STORYTELLING -->
            <div class="link-item">

                <a
                    href="https://example.com/storytelling.pdf"
                    class="main-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-title="Storytelling"
                >
                    <span class="link-icon">📝</span>
                    <span class="link-title">STORYTELLING</span>
                    <span class="download-icon">⬇️</span>
                </a>

                <button
                    class="share-button"
                    type="button"
                    aria-label="Bagikan Storytelling"
                    title="Bagikan tautan"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <path d="M8.7 10.7l6.6-4.4"></path>
                        <path d="M8.7 13.3l6.6 4.4"></path>
                    </svg>
                </button>

            </div>

            <!-- 3. KETENTUAN LOMBA -->
            <div class="link-item">

                <a
                    href="https://example.com/ketentuan-lomba.pdf"
                    class="main-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-title="Ketentuan Lomba"
                >
                    <span class="link-icon">🔗</span>
                    <span class="link-title">KETENTUAN LOMBA</span>
                </a>

                <button
                    class="share-button"
                    type="button"
                    aria-label="Bagikan Ketentuan Lomba"
                    title="Bagikan tautan"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <path d="M8.7 10.7l6.6-4.4"></path>
                        <path d="M8.7 13.3l6.6 4.4"></path>
                    </svg>
                </button>

            </div>

            <!-- 4. TEKS PUISI -->
            <div class="link-item">

                <a
                    href="https://example.com/teks-puisi.pdf"
                    class="main-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-title="Teks Puisi"
                >
                    <span class="link-icon">📄</span>
                    <span class="link-title">TEKS PUISI</span>
                    <span class="download-icon">⬇️</span>
                </a>

                <button
                    class="share-button"
                    type="button"
                    aria-label="Bagikan Teks Puisi"
                    title="Bagikan tautan"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <path d="M8.7 10.7l6.6-4.4"></path>
                        <path d="M8.7 13.3l6.6 4.4"></path>
                    </svg>
                </button>

            </div>

            <!-- 5. MAQRO KALIGRAFI -->
            <div class="link-item">

                <a
                    href="https://example.com/maqro-kaligrafi.pdf"
                    class="main-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-title="Maqro Kaligrafi"
                >
                    <span class="link-icon">📝</span>
                    <span class="link-title">MAQRO KALIGRAFI</span>
                    <span class="download-icon">⬇️</span>
                </a>

                <button
                    class="share-button"
                    type="button"
                    aria-label="Bagikan Maqro Kaligrafi"
                    title="Bagikan tautan"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <path d="M8.7 10.7l6.6-4.4"></path>
                        <path d="M8.7 13.3l6.6 4.4"></path>
                    </svg>
                </button>

            </div>

            <!-- 6. RUNDOWN ACARA -->
            <div class="link-item">

                <a
                    href="https://example.com/rundown-acara.pdf"
                    class="main-link"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-title="Rundown Acara"
                >
                    <span class="link-icon">📄</span>
                    <span class="link-title">RUNDOWN ACARA</span>
                    <span class="download-icon">⬇️</span>
                </a>

                <button
                    class="share-button"
                    type="button"
                    aria-label="Bagikan Rundown Acara"
                    title="Bagikan tautan"
                >
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="18" cy="5" r="3"></circle>
                        <circle cx="6" cy="12" r="3"></circle>
                        <circle cx="18" cy="19" r="3"></circle>
                        <path d="M8.7 10.7l6.6-4.4"></path>
                        <path d="M8.7 13.3l6.6 4.4"></path>
                    </svg>
                </button>

            </div>

        </section>

        <!-- FOOTER -->
        <footer class="footer">
            <a
                href="https://example.com/lembar-qr"
                target="_blank"
                rel="noopener noreferrer"
            >
                🖨️ Lembar QR &amp; Share Sheet (untuk cetak materi)
            </a>
        </footer>

    </main>

    <script>
        // Ambil semua tombol share
        const shareButtons = document.querySelectorAll(".share-button");

        // Jalankan fungsi ketika tombol share diklik
        shareButtons.forEach(function(button) {

            button.addEventListener("click", async function() {

                // Ambil tautan dan judul dari tombol utama
                const linkItem = button.closest(".link-item");
                const mainLink = linkItem.querySelector(".main-link");

                const title = mainLink.dataset.title;
                const url = mainLink.href;

                // Bagikan menggunakan fitur share perangkat
                if (navigator.share) {

                    try {
                        await navigator.share({
                            title: title,
                            text: "Informasi Festival Akbar PPDAMDG 2026: " + title,
                            url: url
                        });

                    } catch (error) {

                        // Pengguna membatalkan share tidak perlu diberi pesan error
                        if (error.name !== "AbortError") {
                            console.error("Gagal membagikan tautan:", error);
                        }

                    }

                } else {

                    // Jika fitur share tidak tersedia, salin tautan
                    try {

                        await navigator.clipboard.writeText(url);
                        alert("Tautan " + title + " berhasil disalin!");

                    } catch (error) {

                        // Alternatif untuk browser lama
                        const textArea = document.createElement("textarea");

                        textArea.value = url;
                        textArea.style.position = "fixed";
                        textArea.style.left = "-9999px";

                        document.body.appendChild(textArea);

                        textArea.select();

                        const copied = document.execCommand("copy");

                        textArea.remove();

                        if (copied) {
                            alert("Tautan " + title + " berhasil disalin!");
                        } else {
                            prompt("Salin tautan berikut:", url);
                        }

                    }

                }

            });

        });
    </script>

</body>
</html>
