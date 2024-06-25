<h3>Article edit</h3>
<form action="/article/update" method="post">
    <input type="text" name="id" value="<?= $article['id'] ?? '' ?>">
    <input type="text" name="title" value="<?= $article['title'] ?? '' ?>">
    <input type="text" name="image_url" value="<?= $article['image_url'] ?? '' ?>">
    <textarea name="contents" id=""><?= $article['body'] ?? '' ?></textarea>
    <input type="submit" value="Update">
</form>
