<?php if (isset($_SESSION['user_id'])): ?>

    <h1>Liste des messages</h1>

    <?php if (empty($posts)): ?>
        <div class="alert alert-info">Aucun message pour le moment.</div>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <a href="index.php?c=PostController&a=detail&id=<?php echo (int)$post['id']; ?>" style="text-decoration: none; color: inherit;">
                        <h5 class="card-title"><?php echo htmlspecialchars($post['titre'] ?? ''); ?></h5>
                    </a>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($post['contenu'] ?? '')); ?></p>
                    <p class="text-muted small">
                        Par <?php echo htmlspecialchars($post['nom'] ?? $post['username'] ?? ''); ?> —
                        <?php echo htmlspecialchars($post['date_publication'] ?? ''); ?>
                    </p>
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