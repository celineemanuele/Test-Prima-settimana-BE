<?php
require_once 'config.php';
require_once 'gestione.php';

$libri = getAllBooks($mysqli);

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria - Libri Per Tutti!</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid">
    <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="https://img.freepik.com/premium-vector/book-shop-icon-library-store-bookstore-symbol_8071-53515.jpg"
          height="60"
          alt="Logo libreria"
          loading="lazy"
        />
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Access</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">News</a>
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <div class="d-flex align-items-center px-2">
    <button type="button" class="btn btn-primary  d-flex mx-2" data-mdb-toggle="modal" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#modaleAggiunta">
        Aggiungi libro
    </button>
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Notifications -->
      <div class="dropdown">
        <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          data-mdb-dropdown-init
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          aria-expanded="false"
        >
        <img
              src="https://mdbootstrap.com/img/new/avatars/8.jpg"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

    <!--<button type="button" class="btn btn-primary mt-4 d-flex mx-auto" data-bs-toggle="modal"
        data-bs-target="#modaleAggiunta">
        Aggiungi un libro
    </button>-->

    <table class="table table-hover container mt-5 border">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col">Anno</th>
                <th scope="col">Genere</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($libri as $key => $libro) { ?>
                <tr class="text-center">
                    <th scope="row">
                        <?= $libro['id'] ?>
                    </th>
                    <td>
                        <?= $libro['titolo'] ?>
                    </td>
                    <td>
                        <?= $libro['autore'] ?>
                    </td>
                    <td>
                        <?= $libro['anno_pubblicazione'] ?>
                    </td>
                    <td>
                        <?= $libro['genere'] ?>
                    </td>
                    <th>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <a role="button" class="btn btn-warning px-2 py-1" data-mdb-toggle="modal"
                                data-mdb-target="#modaleUpdate_<?= $libro['id'] ?>"><i class="fas fa-pencil"></i></a>
                            <a role="button" class="btn btn-danger px-2 py-1"
                                href="gestione.php?action=remove&id=<?= $libro['id'] ?>"><i class="fas fa-trash-can"></i></a>
                        </div>
                    </th>
                </tr>
                <div class="modal fade" id="modaleUpdate_<?= $libro['id'] ?>" tabindex="-1"
                    aria-labelledby="modaleUpdate_<?= $libro['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Modifica i dati</h1>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="gestione.php">
                                    <input type="hidden" name="id" value="<?= $libro['id'] ?>">
                                    <div class="mb-3">
                                        <label for="titoloLibroUp" class="form-label">Titolo</label>
                                        <input type="text" class="form-control" id="titoloLibroUp"
                                            aria-describedby="titoloLibroUp" name="titoloUp"
                                            value="<?= $libro['titolo'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="autoreLibroUp" class="form-label">Autore</label>
                                        <input type="text" class="form-control" id="autoreLibroUp" name="autoreUp"
                                            value="<?= $libro['autore'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="annoLibroUp" class="form-label">Anno di pubblicazione</label>
                                        <input type="number" step="1" min="1800" max="2024" class="form-control"
                                            id="annoLibroUp" name="annoUp" value="<?= $libro['anno_pubblicazione'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="genereLibroUp" class="form-label">Genere</label>
                                        <input type="text" class="form-control" id="genereLibroUp" name="genereUp"
                                            value="<?= $libro['genere'] ?>">
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-secondary"
                                            data-mdb-dismiss="modal">Chiudi</button>
                                        <button type="submit" class="btn btn-primary" name="action" value="update">Aggiorna
                                            libro</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>

<!-- Modale per l'aggiunta di un libro -->
<div class="modal fade" id="modaleAggiunta" tabindex="-1" aria-labelledby="modaleAggiunta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Dati del libro</h1>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="gestione.php">
                    <div class="mb-3">
                        <label for="titoloLibro" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="titoloLibro" aria-describedby="titoloLibro"
                            name="titolo">
                    </div>
                    <div class="mb-3">
                        <label for="autoreLibro" class="form-label">Autore</label>
                        <input type="text" class="form-control" id="autoreLibro" name="autore">
                    </div>
                    <div class="mb-3">
                        <label for="annoLibro" class="form-label">Anno di pubblicazione</label>
                        <input type="number" step="1" min="1800" max="2024" class="form-control" id="annoLibro"
                            name="anno">
                    </div>
                    <div class="mb-3">
                        <label for="genereLibro" class="form-label">Genere</label>
                        <input type="text" class="form-control" id="genereLibro" name="genere">
                    </div>
                    <!--<div class="mb-3">
                        <label for="imageLibroUp" class="form-label">image</label>
                        <input type="file" class="form-control" id="imageLibroUp"  name="image" >
        
                    </div>-->
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Chiudi</button>
                        <button type="submit" class="btn btn-primary" name="action" value="add">Aggiungi il
                            libro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>