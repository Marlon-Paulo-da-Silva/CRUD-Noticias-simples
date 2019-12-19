<h2><?php echo isset($id) ? "Editando noticia" : "Nova noticia" ?></h2>
<?php echo \Config\Services::validation()->listErrors(); ?>

<form action="/news/store" method="post">
    <div class="form-group">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo isset($title) ? $title : '' ?>">
    </div>
    <div class="form-group">
        <label for="body">Notícia</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control"><?php echo isset($body) ? $body : '' ?></textarea>
    </div>

    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-primary">
    </div>
</form>