<!doctype html> 
<html> 
</head> 
    <title><?=  isset($book) ? 'Edit' : 'Add' ?> Book</title>
</head> 
</body> 
    <h1><? isset($book) ? 'Edit' : 'Add' ?> Book</h1>
    <?php if (isset($validation)) : ?>
        <div style="color:orange"> 
            <?= $validation-> listErrors() ?>
        </div>
    <?php endif ?>
    <form method="post" 
        enctype="multipart/form-data"
        action="<?= isset($book) && !empty($book['id']) ? site_url('bookcontroller/update_book/'. $book['id']) :
         site_url('/bookcontroller/store_book/')?>"> 
    <?=csrf_field() ?> 
        <label>Title: 
                <input type="text" name="title" value="<?= esc($book['title'] ?? '') ?>"> 
        </label><br>
        <label>Author: 
                <input type="text" name="author" value="<?= esc($book['author'] ?? '') ?>"> 
        </label><br>
        <label>Genre: 
                <input type="text" name="genre" value="<?= esc($book['genre'] ?? '') ?>"> 
        </label><br>
        <label>Publication Year: 
                <input type="text" name="publication_year" value="<?= esc($book['publication_year'] ?? '') ?>"> 
        </label><br>
        <label>Cover Image: 
                <input type="file" name="cover_image">
                <?php if (!empty($book['cover_image'])): ?>
                    <img src="/uploads/<?= esc($book['cover_image']) ?>" width="60">
                <?php endif; ?>
        </label><br><br> 
         <button type="submit"><?= isset($book) ? 'Update' : 'Save' ?></button>
    </form>
         <a href="/books">Back to List</a>
</body>
</html>