<h3>Add image</h3>
    <form action="image/store" method="post">
        <input type="text" name="path">
        <input type="text" name="description">
        <input type="submit" value="Store">
    </form>

    <table>
    <?php foreach($images as $image) { ?>
        <tr>
            <td><?= $image['id']?></td>
            <td><?= $image['path']?></td>
            <td><?= $image['description']?></td>
            <td><a href="image/edit?id=<?= $image['id']?>"><button>Edit</button></a></td>
            <td>
                <form action="/image/delete" method="post">
                    <input type="hidden" name="id" value="<?= $image['id']?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>