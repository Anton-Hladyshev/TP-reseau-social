<h1 class="mb-4">Créer un nouveau message</h1>

<form action="?c=Post&a=enregistrer" method="post" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="titre" class="form-label fw-semibold">Titre du message :</label>
        <input
            type="text"
            class="form-control"
            name="titre"
            id="titre"
            required>
    </div>

    <div class="mb-3">
        <label for="contenu" class="form-label fw-semibold">Contenu du message :</label>
        <textarea
            class="form-control"
            name="contenu"
            id="contenu"
            rows="5"
            placeholder="Écrivez votre message ici"
            required></textarea>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg" id="enregistrer">
            <i class="bi bi-send-fill me-2"></i> Soumettre le message
        </button>
    </div>
</form>