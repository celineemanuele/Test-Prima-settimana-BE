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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!--<nav class="navbar navbar-expand-lg">
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
          <a class="nav-link" href="#">La mia Libreria</a>
        </li>
      </ul>
    </div>

    <div class="d-flex align-items-center px-2">
    <button type="button" class=" btn btn-primary d-flex mx-2" data-mdb-toggle="modal" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#modaleAggiunta">
        Aggiungi libro
    </button>
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

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
      <div class="dropdown">
        <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
        <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
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
  </div>
</nav>-->
    <div id="dots" class="text-black">
          <i class="dots bi bi-three-dots"></i>
      </div>
      <div class="container-fluid position-fixed top-0 start-0">
        <div class="row">
        <div class="col-md-3 col-sm-12  text-black mt-5 ms-3 mb-3  bg-white rounded">
            <!---<ul id="nav1" class="list-unstyled mb-2">
              <li class="nav-item">
                <div class="mt-5 ms-3 mb-3">
                  <i class="fas fa-bell fa-lg"></i>
                </div>
              </li>
              
            </ul>--->

            <div class="mt-5 ms-3 mb-3">
                  <div class="">
                    <div class="d-flex ">
                        <img src="https://mdbootstrap.com/img/new/avatars/11.jpg" class="rounded-circle" alt="" width="150" />
                    </div> 
                    <div>
                        <h4> Ornella Bianchi </h4>
                    </div>
                </div>
            </div>
            

            <ul id="nav2" class="list-unstyled">
              <li class="nav-item">
                <div class="d-flex align-items-center ms-3 mb-3 p-2">
                  <i class="far fa-file-lines fa-2x"></i>
                  <p class="m-0 px-3">Classroom</p>
                </div>
              </li>
              <li class="nav-item">
                <div class="d-flex align-items-center ms-3 mb-3 p-2">
                  <i class="far fa-file-word fa-2x"></i>
                  <p class="m-0 px-3">Homework</p>
                </div>
              </li>
              <li class="nav-item">
                <div class="d-flex align-items-center ms-3 mb-3 p-2">
                  <i class="fas fa-headphones-simple fa-2x"></i>
                  <p class="m-0 px-3">Audio books</p>
                </div>
              </li>
              <li class="nav-item">
                <div class="mylab d-flex align-items-center ms-3 mb-3 bg-primary p-2 rounded-pill text-white">
                  <i class="fas fa-book fa-2x"></i>
                  <p class="m-0 px-3">My Library</p>
                </div>
              </li>
              <li class="nav-item">
                <div class="d-flex align-items-center ms-3 mb-3 p-2">
                  <i class="fas fa-user-group fa-2x"></i>
                  <p class="m-0 px-3">Classmates</p>
                </div>
              </li>
            </ul>
            <hr>
            <div>
                <ul id="nav1" class="list-unstyled mb-2">
                    <li class="nav-item">
                        <div class="d-flex align-items-center ms-3 mb-3 p-2">
                            <i class="fas fa-gear fa-2x"></i>
                            <p class="m-0 px-3">Settings</p>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-center ms-3 mb-3 p-2">
                        <i class="fas fa-circle-info fa-2x"></i>
                            <p class="m-0 px-3">Help</p>
                        </div>
                    </li>
                
                </ul>
            </div>

          </div>
          
          

    <!--<button type="button" class="btn btn-primary mt-4 d-flex mx-auto" data-bs-toggle="modal"
        data-bs-target="#modaleAggiunta">
        Aggiungi un libro
    </button>-->
    <div id="albumsection" class="col-md col-sm-12 mt-5 ms-3 mb-3">
        <div class="d-flex align-items-center">
            <h2> My Library </h2>
            <button type="button" class=" btn btn-primary d-flex m-2 " data-mdb-toggle="modal" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#modaleAggiunta">
        Aggiungi libro
    </button>
        </div>
    <table class="table table-hover container mt-5 border">
        <thead id="styletable">
            <tr class="text-center">
                <th scope="col">#</th>
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
                    <?= $key+1 ?>
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
                            <a role="button" class="btn  px-2 py-1 border-warning" data-bs-toggle="modal"
                                data-bs-target="#modaleUpdate_<?= $libro['id'] ?>"><i class="fas fa-pencil text-warning"></i></a>
                            <a role="button" class=" deletebtn btn px-2 py-1 border-danger"
                                href="gestione.php?action=remove&id=<?= $libro['id'] ?>"><i class="fas fa-trash-can text-danger"></i></a>
                        </div>
                    </th>
                </tr>
                <div class="modal fade" id="modaleUpdate_<?= $libro['id'] ?>" tabindex="-1"
                    aria-labelledby="modaleUpdate_<?= $libro['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-primary font-weight-bold">Modifica i dati</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            data-bs-dismiss="modal">Chiudi</button>
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
            </div>
            </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>

<!-- Modale per l'aggiunta di un libro -->
<div class="modal fade" id="modaleAggiunta" tabindex="-1" aria-labelledby="modaleAggiunta" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-primary font-weight-bold">Dati del libro</h1>
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