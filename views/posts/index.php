<a class="btn btn-primary" href="/posts/create">Добавить пост</a>
<br>

<div class="posts-list my-3">
    <?php foreach ($posts as $post): ?>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="/post/<?=$post['id']?>">
                    <?= htmlspecialchars($post['title']) ?>
                </a>
                <!-- TODO: test delete and update actions, add form data processing -->
                <div class="actions-wrapper">
                    <a class="btn btn-warning" href="/post/<?=$post['id']?>/update">Редактировать</a>
                    <a class="btn btn-danger" href="/post/<?=$post['id']?>/destroy">Удалить</a>
                </div>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>