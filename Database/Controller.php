<?php 

function getAll() {
    global $conn;
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // rubah jadi array asosiasi
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    return false;
}

function insert($title) {
    global $conn;
    $query = "INSERT INTO books (id, title) VALUES (NULL, '$title')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    }
    return false;
}

function deleteList($id) {
    global $conn;
    $query = "DELETE FROM books WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        return true;
    }
    return false;
}

function updateList($id, $title) {
    global $conn;
    $query = "UPDATE books SET title='$title' WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        return true;
    }
    return false;
}

?>