$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});



$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
    
function domReady(fn) {
    if (
        document.readyState === "complete" ||
        document.readyState === "interactive"
    ) {
        setTimeout(fn, 1000);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

domReady(function () {

    // If found you qr code
    function onScanSuccess(decodeText, decodeResult) {
        alert("You QR is: " + decodeText + ", Result: " + decodeResult);
        document.getElementById('data').value = decodeText;
        let dataset = decodeText.split(" "); 
        let name = dataset[0];
        let phone = dataset[1];
        let email = dataset[2];
        let address = dataset[3];
        document.cookie = "data1=" + name;
        document.cookie = "data2=" + phone;
        document.cookie = "data3=" + email;
        document.cookie = "data4=" + address;
    }
    

    let htmlscanner = new Html5QrcodeScanner(
        "my-qr-reader",
        { fps: 10, qrbos: 250 }
    );
    htmlscanner.render(onScanSuccess);
});

