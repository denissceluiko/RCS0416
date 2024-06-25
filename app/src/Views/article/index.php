    <h3><?= $table ?> create</h3>
    <form action="article/store" method="post">
        <input type="hidden" name="type" value="createArticle">
        <input type="text" name="title">
        <input type="text" name="image_url">
        <textarea name="contents" id=""></textarea>
        <input type="submit" value="Store">
    </form>

    <?php if (!empty($error)) { ?>
        <h1 style="color:red;">Neizdevās pieslēgties MySQL: <?= $error ?></h1>
    <?php } ?>

    <table>
    <?php foreach($articles as $article) { ?>
        <tr>
            <td><?= $article['id']?></td>
            <td><?= $article['title']?></td>
            <td><?= $article['image_url']?></td>
            <td><?= $article['body']?></td>
            <td><a href="article/edit?id=<?= $article['id']?>"><button>Edit</button></a></td>
            <td>
                <form action="/article/delete" method="post">
                    <input type="hidden" name="type" value="deleteArticle">
                    <input type="hidden" name="id" value="<?= $article['id']?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>