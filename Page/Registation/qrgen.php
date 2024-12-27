<?php 
$name = $_POST['name'];
$phone =$_POST['phone'];
$email =$_POST['email'];
$address =$_POST['address'];


$connect = mysqli_connect('localhost', 'root', '', 'event_managment_DB');

$sql = "INSERT INTO customers_details(Name, phone_Number, Email, Address)  /*all visiters are call customers if the customer register the event then that customer is a participent */
        VALUES('$name', '$phone', '$email', '$address')";

$result = mysqli_query($connect, $sql);

if ($result){
    $queryString = http_build_query([
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'address' => $address,
    ]);
    header("Location: qrgen.html?$queryString");
    exit();
    /*echo "<script>location.replace('qrgen.html')</script>";*/
    
}
else{
    echo "<script>location.replace('')</script>";
}

?>