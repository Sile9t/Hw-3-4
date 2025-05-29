<form method="POST">
    <input type="text" name="id" value="<?= $post['id'] ?? 0 ?>" hidden>

    <!-- Поле Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$post['title'] ?? ''?>">
    </div>

    <!-- Поле Content -->
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content"  name="content" rows="5"><?=$post['content'] ?? ''?></textarea>
    </div>

    <!-- Кнопка отправки формы -->
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
