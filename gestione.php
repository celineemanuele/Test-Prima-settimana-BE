<?php

require_once "config.php";

/*$target_dir = "uploads/";
$image = $target_dir.'avatar.png';

if(!empty($_FILES['image'])) {
    if($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpg') {
        if($_FILES['image']["size"] < 4000000) {
            if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'])) {
                    $image = $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'];
                    echo 'Caricamento avvenuto con successo';
                } else {
                    echo 'Errore!!!';
                }
            }
        } else {
            echo 'FileSize troppo grande';
        }
    } else {
        echo 'FileType non supportato';
    }
}*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titolo = isset($_REQUEST['titolo']) ? trim(htmlspecialchars($_REQUEST['titolo'])) : null;
    //$titolo = trim(htmlspecialchars($_REQUEST['titolo'])) ? trim(htmlspecialchars($_REQUEST['titolo'])) : null;
    /*$autore = trim(htmlspecialchars($_REQUEST['autore'])) ? trim(htmlspecialchars($_REQUEST['autore'])) : null;
    $anno_pubblicazione = trim(htmlspecialchars($_REQUEST['anno_pubblicazione'])) ? trim(htmlspecialchars($_REQUEST['anno_pubblicazione'])) : null;
    $genere = trim(htmlspecialchars($_REQUEST['genere'])) ? trim(htmlspecialchars($_REQUEST['genere'])) : null;*/
    $autore = isset($_REQUEST['autore']) ? trim(htmlspecialchars($_REQUEST['autore'])) : null;
    $anno_pubblicazione = isset($_REQUEST['anno_pubblicazione']) ? trim(htmlspecialchars($_REQUEST['anno_pubblicazione'])) : null;
    $genere = isset($_REQUEST['genere']) ? trim(htmlspecialchars($_REQUEST['genere'])) : null;
}

$book = [
    "titolo" => isset($_REQUEST['titolo']) ? $_REQUEST['titolo'] : '',
    "autore" => isset($_REQUEST['autore']) ? $_REQUEST['autore'] : '',
    "anno_pubblicazione" => isset($_REQUEST['anno']) ? $_REQUEST['anno'] : '',
    "genere" => isset($_REQUEST['genere']) ? $_REQUEST['genere'] : '',
    //'image' => $image
];

function getAllBooks($mysqli)
{
    $libri = [];
    $sql = "SELECT * FROM libri;";
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $libri[] = $row;
        }
    }
    return $libri;
}


function addBook($mysqli, $book)
{
    $titolo = $book['titolo'];
    $autore = $book['autore'];
    $anno_pubblicazione = $book['anno_pubblicazione'];
    $genere = $book['genere'];
    //$image = $book['image'];

    $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) 
                VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere')";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
    header('location: index.php');
}

function removeBook($mysqli, $id)
{
    if (!$mysqli->query('DELETE FROM libri WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Libro rimosso con successo!';
    }
}


function updateBook($mysqli, $id, $titolo, $autore, $anno_pubblicazione, $genere)
{
    $sql = "UPDATE libri SET 
                        titolo = '" . $titolo . "', 
                        autore = '" . $autore . "',
                        anno_pubblicazione = '" . $anno_pubblicazione . "',
                        genere = '" . $genere . "'
                        WHERE id = '" . $id . "'";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Libro modificato con successo!';
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        updateBook($mysqli, $_POST['id'],$_POST['titoloUp'], $_POST['autoreUp'], $_POST['annoUp'], $_POST['genereUp'],);
        exit(header('Location: index.php'));
    } else {
        addBook($mysqli, $book);
    }

} else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'remove') {
    removeBook($mysqli, $_REQUEST['id']);
    exit(header('Location: index.php'));
}


?>