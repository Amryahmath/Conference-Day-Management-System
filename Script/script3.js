document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);
    const name = params.get('name');
    const phone = params.get('phone');
    const email = params.get('email');
    const address = params.get('address');

    if (!name || !phone || !email || !address) {
        alert("Required parameters are missing in the URL!");
    } else {
        qrgen(name, phone, email, address);
    }

    function qrgen(name, phone, email, address) {
        let qrImage = document.getElementById('qrimage'); // Now it's inside the DOMContentLoaded listener
        let qrApiUrl = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(name + " " + phone + " " + email + " " + address)}`;
        // Set the image source to the generated QR code
        qrImage.src = qrApiUrl; 
    }

    // Download QR Code as an Image
    document.getElementById('download-btn').addEventListener('click', function () {
        const qrContainer = document.getElementById('qr-code');
        html2canvas(qrContainer).then((canvas) => {
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'qr-code.png';
            link.click();
        });
    });
});
