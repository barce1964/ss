<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>
                        <label for="name_p">Название проекта:</label><input type="text" name="nameP" id="name_p">
                    </td>
                    <td>
                        <label for="date_p">Дата:</label><input type="date" name="dateP" id="date_p">
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <label for="place_p">Место назначения:</label>
                                </td>
                                <td>
                                    <select name="id_place" id="place_p">
                                        <?php if (is_array($placeList)): ?>
                                            <?php foreach ($placeList as $place): ?>
                                                <option value="<?php echo $place['id_place']; ?>">
                                                    <?php echo $place['name_place']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="/projects/new/addplace"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>
