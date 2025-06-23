<?php
$host = "192.168.0.7";
$username = "dvwa";
$password = "password";
$database = "dvwa"; 

// Połączenie z bazą
$conn = new mysqli($host, $username, $password, $database);

// Sprawdzenie błędów
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zabezpieczone zapytanie
$query = "SELECT first_name, password FROM users";
$result = $conn->query($query);

// Wyświetlanie wyników
if ($result) {
    while ($record = $result->fetch_assoc()) {
        echo htmlspecialchars($record["first_name"]) . ", " . htmlspecialchars($record["password"]) . "<br />";
    }
} else {
    echo "Błąd zapytania: " . $conn->error;
}

// Zamknięcie połączenia
$conn->close();
?>