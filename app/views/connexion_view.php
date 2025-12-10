<h1>Connexion</h1>

<?php
if (isset($_SESSION['login_error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($_SESSION['login_error']); ?>
    </div>
    <?php unset($_SESSION['login_error']); ?>
<?php } ?>

<form action="?c=User&a=login" method="POST">

    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail:</label>
        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe:</label>
        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>

    <p class="mt-3">
        Pas encore de compte? <a href="?c=User&a=inscription">Inscrivez-vous ici.</a>
    </p>

</form>