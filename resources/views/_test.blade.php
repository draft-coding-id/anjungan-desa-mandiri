<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nomor Telepon</title>
    <style>
        /* Styling sederhana untuk lightbox */
        #lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        #lightbox-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }

        #lightbox button {
            margin: 10px;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h2>Form Nomor Telepon</h2>
    <form id="phoneForm" action="/berhasil" method="POST">
        <label for="phone">Masukkan Nomor Telepon:</label>
        <input type="tel" id="phone" name="phone" placeholder="Contoh: 081234567890" required>
        <span id="error-message" class="error"></span><br><br>
        <button type="button" onclick="validateAndShowLightbox()">Lanjutkan</button>
    </form>

    <!-- Lightbox untuk konfirmasi -->
    <div id="lightbox">
        <div id="lightbox-content">
            <p id="confirmation-message"></p>
            <button onclick="proceed()">Konfirmasi</button>
            <button onclick="closeLightbox()">Ubah</button>
        </div>
    </div>

    <script>
        // Fungsi untuk validasi form dan menampilkan lightbox
        function validateAndShowLightbox() {
            const phoneInput = document.getElementById("phone");
            const errorMessage = document.getElementById("error-message");
            const lightbox = document.getElementById("lightbox");
            const confirmationMessage = document.getElementById("confirmation-message");

            // Reset pesan error
            errorMessage.textContent = "";

            // Cek apakah nomor telepon sudah diisi
            if (!phoneInput.value) {
                errorMessage.textContent = "Nomor telepon wajib diisi.";
                return;
            }

            // Tampilkan lightbox untuk konfirmasi
            confirmationMessage.textContent = `Apakah nomor telepon ${phoneInput.value} sudah benar?`;
            lightbox.style.display = "flex";
        }

        // Fungsi untuk melanjutkan proses (konfirmasi berhasil)
        function proceed() {
            // Pastikan nomor telepon valid, kemudian submit form
            const form = document.getElementById("phoneForm");
            form.submit();
        }

        // Fungsi untuk menutup lightbox
        function closeLightbox() {
            const lightbox = document.getElementById("lightbox");
            lightbox.style.display = "none";
        }
    </script>
</body>
</html>
