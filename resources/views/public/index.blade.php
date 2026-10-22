<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPMB 2027 | SDIT Matahati</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: #202b3a;

            background-color: #eef8f9;

            background-image:
                linear-gradient(180deg,
                    rgba(239, 249, 249, var(--overlay-opacity, 0.85)),
                    rgba(239, 249, 249, var(--overlay-opacity, 0.90))),
                var(--background-image, none);

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }


        .container {
            width: 100%;
            max-width: 620px;
            margin: auto;
            padding: 28px 16px 20px;
        }

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

        .header h2 {
            margin: 0 0 10px;
            font-size: 23px;
            font-weight: 700;
            line-height: 1.3;
        }

        .header p {
            margin: 0;
            color: #5d6672;
            font-size: 17px;
            line-height: 1.5;
        }

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

        .main-link {
            display: flex;
            align-items: center;
            flex: 1;
            min-width: 0;
            min-height: 75px;
            gap: 18px;
            padding: 16px 24px;
            border-radius: 17px;

            background: rgba(12, 157, 163, 0.97);
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 700;

            box-shadow: 0 4px 12px rgba(24, 60, 65, 0.13);
            transition: .2s;
        }

        .main-link:hover {
            background: #087f85;
            transform: translateY(-2px);
        }

        .link-icon {
            flex-shrink: 0;
            width: 28px;
            text-align: center;
            font-size: 23px;
        }

        .link-title {
            flex: 1;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .download-icon {
            flex-shrink: 0;
            font-size: 14px;
        }

        .share-button {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 60px;
            min-height: 75px;
            padding: 0;
            border: 0;
            border-radius: 17px;

            background: #ffffff;
            color: #515b67;
            cursor: pointer;

            box-shadow: 0 4px 12px rgba(24, 60, 65, 0.13);
            transition: .2s;
        }

        .share-button:hover {
            background: #f0f3f5;
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

        .footer {
            margin-top: 27px;
            text-align: center;
        }

        .footer a {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 8px;

            color: #46545c;
            background: rgba(255, 255, 255, 0.65);

            font-size: 14px;
            line-height: 1.6;
            text-decoration: underline;
        }

        .empty-message {
            text-align: center;
            color: #5d6672;
            padding: 30px 15px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
        }

        @media (max-width: 768px) {
            body {
                background-attachment: scroll;
            }
        }

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

            .header h2 {
                font-size: 21px;
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


<body
    style="
        --background-image: {{ $backgroundImage ? 'url(' . json_encode($backgroundImage) . ')' : 'none' }};
        --overlay-opacity: {{ $overlayOpacity }};
    ">


    <main class="container">

        <header class="header">
            <h1>Sistem Penerimaan Murid Baru</h1>
            <h2>SDIT Matahati</h2>

            <p>
                Tahun Pelajaran 2026/2027<br>
                {{-- Tingkat SD/MI/Sederajat Se- Jawa Barat --}}
            </p>
        </header>

        <section class="link-list">

            @forelse($links as $link)
                <div class="link-item">

                    <a href="{{ $link->type === 'pdf' && $link->file_path ? asset('storage/' . $link->file_path) : $link->url }}"
                        class="main-link" target="_blank" rel="noopener noreferrer" data-title="{{ $link->title }}">
                        <span class="link-icon">{{ $link->icon }}</span>

                        <span class="link-title">
                            {{ $link->title }}
                        </span>

                        @if ($link->show_download)
                            <span class="download-icon">⬇️</span>
                        @endif
                    </a>

                    <button class="share-button" type="button" aria-label="Bagikan {{ $link->title }}"
                        title="Bagikan tautan">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <path d="M8.7 10.7l6.6-4.4"></path>
                            <path d="M8.7 13.3l6.6 4.4"></path>
                        </svg>
                    </button>

                </div>

            @empty

                <div class="empty-message">
                    Belum ada informasi penerimaan murid baru yang tersedia.
                </div>
            @endforelse

        </section>

        <footer class="footer">
            <a href="#" onclick="return false;">
                🖨️ Lembar QR &amp; Share Sheet (untuk cetak materi)
            </a>
        </footer>

    </main>

    <script>
        document.querySelectorAll('.share-button').forEach(function(button) {

            button.addEventListener('click', async function() {

                const link = button.closest('.link-item')
                    .querySelector('.main-link');

                const title = link.dataset.title;
                const url = link.href;

                if (navigator.share) {
                    try {
                        await navigator.share({
                            title: title,
                            text: 'Informasi SPMB SDIT Matahati: ' + title,
                            url: url
                        });
                    } catch (error) {
                        if (error.name !== 'AbortError') {
                            console.error(error);
                        }
                    }

                    return;
                }

                try {
                    await navigator.clipboard.writeText(url);
                    alert('Tautan berhasil disalin!');
                } catch (error) {
                    window.prompt('Salin tautan berikut:', url);
                }

            });

        });
    </script>

</body>

</html>
