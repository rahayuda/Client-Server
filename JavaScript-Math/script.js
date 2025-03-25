function deteksiTepi() {
    var fileInput = document.getElementById('fileInput');

    if (fileInput.files.length > 0) {
        var img = new Image();
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);

        img.onload = function () {
            var canvasTepi = document.createElement('canvas');
            canvasTepi.width = img.width;
            canvasTepi.height = img.height;
            var ctxTepi = canvasTepi.getContext('2d');

            ctxTepi.drawImage(img, 0, 0, img.width, img.height);

            var canvasInput = document.createElement('canvas');
            canvasInput.width = img.width;
            canvasInput.height = img.height;
            var ctxInput = canvasInput.getContext('2d');
            ctxInput.drawImage(img, 0, 0, img.width, img.height);

            for (var x = 1; x < img.width - 1; x++) {
                for (var y = 1; y < img.height - 1; y++) {
                    var pixelKiri = ctxInput.getImageData(x - 1, y, 1, 1).data;
                    var pixelTengah = ctxInput.getImageData(x, y, 1, 1).data;
                    var pixelKanan = ctxInput.getImageData(x + 1, y, 1, 1).data;

                    var gradienMerah = pixelKiri[0] + pixelKanan[0] - 2 * pixelTengah[0];
                    var gradienHijau = pixelKiri[1] + pixelKanan[1] - 2 * pixelTengah[1];
                    var gradienBiru = pixelKiri[2] + pixelKanan[2] - 2 * pixelTengah[2];

                    var gradien = Math.sqrt(gradienMerah ** 2 + gradienHijau ** 2 + gradienBiru ** 2);
                    gradien = Math.min(255, gradien);
                    gradien = 255 - gradien;

                    ctxTepi.fillStyle = 'rgb(' + gradien + ',' + gradien + ',' + gradien + ')';
                    ctxTepi.fillRect(x, y, 1, 1);
                }
            }

            var cardBody = document.querySelector('.card-body');
            cardBody.innerHTML = '';

            // Tambahkan input gambar
            cardBody.appendChild(img);

            // Tambahkan output hasil deteksi tepi
            cardBody.appendChild(canvasTepi);

            // Buat tombol download
            var outputTepi = canvasTepi.toDataURL('image/jpeg');
            var downloadButton = document.createElement('button');
            downloadButton.textContent = 'Download';
            downloadButton.style.marginTop = '10px';
            
            downloadButton.addEventListener('click', function () {
                var a = document.createElement('a');
                a.href = outputTepi;
                a.download = 'output_tepi_laplace.jpg';
                a.click();
            });

            cardBody.appendChild(downloadButton);
        };
    }
}

document.getElementById('imageForm').addEventListener('submit', function (event) {
    event.preventDefault();
    deteksiTepi();
});
