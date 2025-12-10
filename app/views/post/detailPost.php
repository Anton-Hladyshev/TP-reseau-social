<h1><?php echo htmlspecialchars($post['titre']); ?></h1>
<p><?php echo nl2br(htmlspecialchars($post['contenu'])); ?></p>
<hr>

<h3>Ajouter un commentaire</h3>

<div id="comment-status" class="alert d-none" role="alert"></div>

<form id="comment-form">
    <input type="hidden" name="post_id" value="<?php echo (int)$post['id']; ?>">

    <input type="hidden" name="utilisateur_id" value="<?php echo (int)$_SESSION['user_id']; ?>">

    <div class="mb-3">
        <label for="contenu" class="form-label">Ecrivez votre commentaire</label>
        <textarea class="form-control" id="contenu" name="contenu" rows="3" maxlength="100" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Envoyer le commentaire</button>
</form>

<h3>Commentaires (<?php echo count($comments); ?>)</h3>

<div id="comments-list">
    <?php if (empty($comments)): ?>
        <p id="no-comments-message" class="text-info">Pas de commentaires</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="card mb-2 comment-item" id="comment-<?php echo $comment['id']; ?>">
                <div class="card-body p-3">
                    <p class="mb-1"><?php echo nl2br(htmlspecialchars($comment['contenu'])); ?></p>
                    <small class="text-muted">
                        Posté par <strong><?php echo htmlspecialchars($comment['nom_utilisateur']); ?></strong>
                        le <?php echo htmlspecialchars($comment['date_commentaire']); ?>
                    </small>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<hr>