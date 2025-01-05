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
                                                <?php if (($place['id_place'] != 1) && ($place['id_place'] != 2)): ?>
                                                    <option value="<?php echo $place['id_place']; ?>">
                                                        <?php echo $place['name_place']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="/projects/new/addplace"><i class="fa fa-plus"></i></a>
                                </td>
                                <td style="width: 150px;">
                                    <input type="submit" name="submit" class="btn btn-default" style="marging-left:30px;" value="Создать">
                                </td>
                                <td style="width: 150px;">
                                    <input type="submit" name="submit" class="btn btn-default" style="marging-left:30px;" value="Отменить">
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
