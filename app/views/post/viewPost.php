<?php if (isset($_SESSION['user_id'])): ?>

    <h1>Liste des messages</h1>

    <?php if (empty($posts)): ?>
        <div class="alert alert-info">Aucun message pour le moment.</div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($post['titre'] ?? ''); ?></h5>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($post['contenu'] ?? '')); ?></p>
                    <p class="text-muted small">
                        Par <?php echo htmlspecialchars($post['nom'] ?? $post['username'] ?? ''); ?> —
                        <?php echo htmlspecialchars($post['date_publication'] ?? ''); ?>
                    </p>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['utilisateur_id']): ?>
                        <a href="?c=PostController&a=edit&id=<?php echo (int)$post['id']; ?>" class="btn btn-sm btn-outline-primary">Modifier</a>

                        <form method="post" action="?c=PostController&a=delete" class="d-inline" onsubmit="return confirm('Confirmer la suppression de ce message ?');">
                            <input type="hidden" name="id" value="<?php echo (int)$post['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

<?php else: ?>

    <div class="alert alert-warning" role="alert">
        Vous devez être connecté pour voir les mesages.
        <a href="index.php?c=UserController&a=loginUser" class="alert-link">Se connecter</a>
    </div>
<?php endif; ?>