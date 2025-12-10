<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réseau Interne d'Entreprise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/View/css/style.css"> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href='?c=Home'>Réseau Interne</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href='?c=Home'>Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?c=Post&a=index">Fil d'actualité</a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-success btn-sm ms-2" href='?c=Post&a=ajouter'>
                                + Créer un message
                            </a>
                        </li>
                    <?php } ?>

                    <?php 
                    if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) { ?>
                        <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle text-danger" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Administration
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                <li><a class="dropdown-item" href='?c=Admin&a=utilisateurs'>Gérer les utilisateurs</a></li>
                             </ul>
                        </li>
                    <?php } ?>
                </ul>
                
                <ul class="navbar-nav">
                    <?php 
                    if (isset($_SESSION['user_id'])) { 
                        $username = $_SESSION['username'] ?? 'Utilisateur'; 
                        ?>
                        <li class="nav-item me-3 d-flex align-items-center">
                            <span class="navbar-text fw-semibold text-success">
                                Salut, <?php echo htmlspecialchars($username); ?> !
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?c=User&a=profil">Mon Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger ms-2" href='?c=User&a=deconnecter'>Déconnexion</a>
                        </li>
                    <?php 
                    } else { ?>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href='?c=User&a=inscription'>Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href='?c=User&a=connexion'>Connexion</a>
                        </li>
                    <?php 
                    } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container w-75 m-auto mt-4">
        </div>
</body>
</html>