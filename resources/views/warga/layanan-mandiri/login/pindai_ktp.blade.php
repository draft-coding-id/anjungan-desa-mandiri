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
            background-image: url('{{asset('assets/BackgroundMockupAnjungan.png') }}');
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
            width: 100%;
            padding: 10px;
            border: 1px solid #000000;
            border-radius: 5px;
            margin-top: 10px;
            background-color: transparent;
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

        .ktp-picture {
            opacity: 0.75;
            height: 250px;
            width: 250px;
            position: relative;
            overflow: hidden;

            /* default image */
            background: url('{{asset('assets/id-card_2094626.png')}}');

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* box-shadow: 0 8px 6px -6px black; */
        }

        .file-uploader {
            opacity: 0;
            height: 100%;
            width: 100%;
            cursor: pointer;
            position: absolute;
            top: 0%;
            left: 0%;
        }

        .upload-icon {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* initial icon state */
            opacity: 0;
            transition: opacity 0.3s ease;
            color: #ccc;
            -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: #bbb;
        }

        .ktp-picture:hover .upload-icon {
            opacity: 1;
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
                    <h1>Selamat Datang</h1>
                    <h2>Silahkan pindai E-KTP anda untuk masuk </h2>
                </div>
                <div>
                    <h3>Upload File KTP Anda</h3>
                    <form action="{{route('login.scanKtp')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="ktp-picture">
                            <h1 class="upload-icon">
                                <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                            </h1>
                            <input class="file-uploader" type="file" accept="image/*" name="ktp" />
                        </div>
                        @error('ktp')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="button">Cek</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="button-container">
            <a href="/warga" class="button">Kembali</a>
        </div>
    </main>
</body>
<script>
    const fileUpload = document.querySelector('.file-uploader');
    // console.log(fileUpload);
    fileUpload.addEventListener('change' , function (){
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(){
            const ktpPicture = document.querySelector('.ktp-picture');
            ktpPicture.style.background = `url(${reader.result})`;
            ktpPicture.style.opacity = 1;
            ktpPicture.style.width = '600px';
            ktpPicture.style.height = '350px';
            ktpPicture.style.backgroundPosition = 'center';
            ktpPicture.style.backgroundRepeat = 'no-repeat';
            ktpPicture.style.backgroundSize = 'cover';
            // console.log(ktpPicture);
        }
        reader.readAsDataURL(file);

    })

</script>

</html>