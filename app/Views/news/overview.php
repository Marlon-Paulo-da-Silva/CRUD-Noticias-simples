<script>
    function confirmation() {
        if (!confirm('Deseja excluir?')) {
            return false;
        }

        return true;
    }
</script>

<h2>Arquivo de noticia</h2>
<div class="row my-3">
    <a href="/news/create" class="btn btn-primary">Nova noticia</a>
</div>
<table class="table">
    <tr>
        <th>Titulo</th>
        <th>Ação</th>
    </tr>
    <?php if (!empty($news) && is_array($news)) : ?>
        <?php foreach ($news as $news_item) : ?>
            <tr>
                <td><a href="<?php echo "/news/view/" . $news_item['id'] ?>"><?php echo $news_item['title'] ?></a></td>
                <td>
                    <a href="/news/edit/<?php echo $news_item['id'] ?>">Editar</a>
                    -
                    <a href="/news/delete/<?php echo $news_item['id'] ?>" onclick="return confirmation()">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="2">Nenhuma Noticia encontrada</td>
        </tr>
    <?php endif; ?>

</table>