<h2>Modifier le message</h2>
<form method="post" action="?c=PostController&a=update">
    <input type="hidden" name="id" value="<?php echo (int)$post['id']; ?>">
    <div class="mb-3">
        <label>Titre</label>
        <input class="form-control" name="titre" value="<?php echo htmlspecialchars($post['titre']); ?>">
    </div>
    <div class="mb-3">
        <label>Contenu</label>
        <textarea class="form-control" name="contenu" rows="6"><?php echo htmlspecialchars($post['contenu']); ?></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Enregistrer</button>
    <a class="btn btn-secondary" href="?c=PostController&a=index">Annuler</a>
</form>