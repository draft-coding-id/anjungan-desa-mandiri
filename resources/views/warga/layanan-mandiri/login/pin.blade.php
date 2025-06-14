<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Anjungan Desa Mandiri</title>
    <link rel="icon" href="https://rawapanjang-desa.id/desa/logo/1679693855_logo-pemkab-bogor.png" type="image/png">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: hidden;
        }

        main {
            height: 100vh;
            width: 100vw;
            font-family: sans-serif;
            background-image: url('{{ asset('assets/BackgroundMockupAnjungan.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 20px;
        }

        .left-col {
            background-color: #D9D9D9BF;
            width: 50vw;
            height: 100%;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-col h1 {
            font-size: 36px;
            text-align: center;
            line-height: 20%;
        }

        .left-col img {
            width: 200px;
            height: 200px;
        }

        .right-col {
            width: 50vw;
            height: 100%;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right-col p {
            font-size: 24px;
            font-weight: bold;
        }

        input {
            font-size: 36px;
            padding: 10px;
            width: 50px;
            height: 50px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-top: 10px;
            background-color: transparent;
        }

        .pin {
            font-size: 36px;
            padding: 10px;
            width: 50px;
            height: 50px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-top: 10px;
            background-color: transparent;
            text-align: center;
        }

        .button-container {
            position: absolute;
            left: 45%;
            bottom: 0%;
            padding: 20px;
        }

        .button {
            display: flex;
            margin-top: 10px;
            justify-content: center;
            align-items: center;
            background-color: #ff9900;
            color: white;
            padding: 10px 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            flex-shrink: 0;
            font-size: 16px;
            line-height: 1.3;
            letter-spacing: 0.5px;
            height: 50px;
            max-width: 120px;
            transition: background 0.3s;
        }

        .button:hover {
            background-color: #e68a00;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <div class="left-col">
                <img src="{{asset('assets/logo.png')}}" alt="Logo Desa Rawapanjang" />
                <h1>
                    Anjungan Desa Mandiri
                </h1>
                <h1>
                    Desa Rawapanjang
                </h1>
                <h1>
                    Kabupaten Bogor
                </h1>
            </div>
            <div class="right-col" style="text-align: center">
                <div>
                    <h1>Silahkan masukan PIN Keamanan Anda</h1>
                    <form action="{{route('login.checkPin')}}" method="POST">
                        @csrf
                        <input hidden name="nik" value="{{$nik}}" />
                        <input type="number" name="pin1" class="pin" min="0" max="9" maxlength="1" />
                        <input type="number" name="pin2" class="pin" min="0" max="9" maxlength="1" />
                        <input type="number" name="pin3" class="pin" min="0" max="9" maxlength="1" />
                        <input type="number" name="pin4" class="pin" min="0" max="9" maxlength="1" />
                        <input type="number" name="pin5" class="pin" min="0" max="9" maxlength="1" />
                        <input type="number" name="pin6" class="pin" min="0" max="9" maxlength="1" />
                        <input type="hidden" name="pin" id="pin" />
                        @if(session('error'))
                        <p style="color: red;">{{session('error')}}</p>
                        @endif
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="button">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="button-container">
            <a href="/warga" class="button">Kembali</a>
        </div>
    </main>

    <script>
        const pinInputs = document.querySelectorAll('.pin');

        pinInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                let value = e.target.value;

                // Hanya izinkan angka 0–9
                if (!/^[0-9]$/.test(value)) {
                    e.target.value = '';
                    return;
                }

                // Otomatis fokus ke input berikutnya jika ada
                if (value.length === 1 && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }

                // Update hidden input "pin" dengan nilai seluruh PIN
                updatePin();
            });

            // Navigasi dengan tombol panah & backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    pinInputs[index - 1].focus();
                }
                if (e.key === 'ArrowLeft' && index > 0) {
                    pinInputs[index - 1].focus();
                }
                if (e.key === 'ArrowRight' && index < pinInputs.length - 1) {
                    pinInputs[index + 1].focus();
                }
            });
        });

        function updatePin() {
            const combined = Array.from(pinInputs).map(input => input.value).join('');
            document.getElementById('pin').value = combined;
        }
    </script>

</body>

</html>