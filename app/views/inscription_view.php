<h1>Inscription</h1>

<form action="?c=User&a=creer" method="POST">
    
    <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur:</label>
        <input 
            type="text" 
            class="form-control" 
            id="username" 
            name="username" 
            required
        >
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail:</label>
        <input 
            type="email" 
            class="form-control" 
            id="email" 
            name="email" 
            required
        >
        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email.</div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe:</label>
        <input 
            type="password" 
            class="form-control" 
            id="password" 
            name="password" 
            required
        >
    </div>

    <button type="submit" class="btn btn-success">S'inscrire</button>
    
    <p class="mt-3">
        Déjà un compte? <a href="?c=User&a=connexion">Connectez-vous ici.</a>
    </p>
</form>