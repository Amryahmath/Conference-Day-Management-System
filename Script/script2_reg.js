document.getElementById('registrationForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const email = document.getElementById('email').value.trim();
    const address = document.getElementById('address').value.trim();

    if (!name || !phone || !email || !address) {
        alert("All fields are required!");
        return;
    }

    alert(`Registration successful!\n\nName: ${name}\nPhone: ${phone}\nEmail: ${email}\nAddress: ${address}`);
});

function qrgenreter(){
    
}
