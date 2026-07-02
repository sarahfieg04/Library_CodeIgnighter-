<!doctype html> 
<html> 
<head> 
<title> List of Books</title>
</head>
<body> 
    <h1>Books</h1>
    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color:forestgreen"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <a href="/bookcontroller/create_book">Add Book</a>    
    <table border ="1" cellpadding="4">
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($books)): ?>
        <?php foreach ($books as $book) : ?>
        <tr> 
            <td> 
                <?php if ($book['cover_image']): ?>
                    <img src="/uploads/<?= esc($book['cover_image']) ?>" width="60">
                    <?php else: ?>
                        <span> No image found </span>
                    <?php endif; ?>
            </td>
            <td><?= esc($book['title']) ?></td>
            <td><?= esc($book['author']) ?></td>
            <td><?= esc($book['genre']) ?></td>
            <td><?= esc($book['publication_year']) ?></td>
            <td> 
                <a href="/bookcontroller/edit_book/<?= $book['id'] ?>">Edit</a>
                <form action="/bookcontroller/delete_book/<?= $book['id'] ?>" method="post"
                style = "display:inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                    <?= csrf_field() ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6"> No books found.<td> 
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
