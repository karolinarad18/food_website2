<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "error", "message" => "User not logged in"]);
    exit();
}

$email = $_SESSION['user'];

$conn = mysqli_connect("localhost", "root", "", "strona");
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection error"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['productName']) && isset($data['price'])) {
    $productName = mysqli_real_escape_string($conn, $data['productName']);
    $price = floatval($data['price']);

    // Pobierz ID użytkownika
    $email_escaped = mysqli_real_escape_string($conn, $email);
    $userid_query = "SELECT ID_uzytkownika FROM uzytkownicy WHERE email='$email_escaped'";
    $query_id = mysqli_query($conn, $userid_query);
    if ($query_id) {
        $row = mysqli_fetch_assoc($query_id);
        if ($row) {
            $userid = $row['ID_uzytkownika'];
            // Dodaj produkt do bazy danych
            $insert_query = "INSERT INTO zamowienie (ID_uzytkownika, nazwa, cena) VALUES ($userid, '$productName', $price)";
            if (mysqli_query($conn, $insert_query)) {
                echo json_encode(["status" => "success", "message" => "Product added to cart"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error adding product to cart"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "User not found"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error querying user"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid product data"]);
}

mysqli_close($conn);
?>
