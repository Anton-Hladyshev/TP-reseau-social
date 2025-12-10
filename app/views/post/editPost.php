<h2 class="mb-4 text-primary">Modifier le message</h2>

<form method="post" action="?c=Post&a=update">
    <input type="hidden" name="id" value="<?php echo (int)$post['id']; ?>">
    
    <div class="mb-3">
        <label for="titre_edit" class="form-label fw-semibold">Titre :</label>
        <input 
            type="text" 
            class="form-control" 
            name="titre" 
            id="titre_edit"
            value="<?php echo htmlspecialchars($post['titre']); ?>"
            required
        >
    </div>
    
    <div class="mb-3">
        <label for="contenu_edit" class="form-label fw-semibold">Contenu :</label>
        <textarea 
            class="form-control" 
            name="contenu" 
            id="contenu_edit" 
            rows="8"
            required
        ><?php echo htmlspecialchars($post['contenu']); ?></textarea>
    </div>
    
    <div class="mt-4">
        <button class="btn btn-success me-2" type="submit">
            <i class="bi bi-save me-1"></i> Enregistrer les modifications
        </button>
        <a class="btn btn-secondary" href="?c=PostController&a=index">
            Annuler
        </a>
    </div>
</form>