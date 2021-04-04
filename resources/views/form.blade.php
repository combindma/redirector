<div class="mb-4">
    <label class="form-label">Ancien lien</label>
    <input type="text" name="old_url" value="{{ old('old_url', optional($redirect)->old_url) }}" class="form-control" placeholder="/non-existing-page" required>
</div>
<div class="mb-4">
    <label class="form-label">Rediréger vers le lien</label>
    <input type="text" name="new_url" value="{{ old('new_url', optional($redirect)->new_url) }}"
           class="form-control" placeholder="/existing-page" required>
</div>
<div class="mb-4">
    <label class="form-label">Statut de la redirection</label>
    <input type="number" name="status" value="{{ old('status', optional($redirect)->status)??301 }}"
           class="form-control" placeholder="p, ex: 301,302...">
</div>
