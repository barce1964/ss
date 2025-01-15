<?php include ROOT . '/views/layouts/header_little.php'; ?>

<style>
    .dropbtn {
        margin-top: 20px;
        margin-left: 20px;
        background-color: #D6D6D0;
        color: #36349f;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #D6D6D0;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color:  #36349f;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #fff;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #868680;}
</style>

<div class="dropdown">
    <?php if (is_array($typeList)): ?>
        <?php foreach ($typeList as $type): ?>
            <?php if ($type['id_type'] == $id_type): ?>
                <button class="dropbtn"><?php echo $type['name_type']; ?></button>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="dropdown-content">
            <?php foreach ($typeList as $type): ?>
                <a href="/projects/ord/<?php echo $id_ord; ?>/<?php echo $type['id_type']; ?>">
                    <?php echo $type['name_type']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<form action="#" method="post" enctype="multipart/form-data">
    <table class="table-bordered table-striped table">
        <tr>
            <th>Наименование</th>
            <th>Остаток на базе</th>
            <th>Количество</th>
            <th>Единица измерения</th>
            <th>Взять с другого объекта</th>
        </tr>

        <?php foreach ($eqList as $eq): ?>
            <tr>
                <td><?php echo $eq['name_eq']; ?></td>
                <td><?php echo $eq['eq_quantity']; ?></td>
                <td><input type="text" name="quantity<?php echo $eq['id_eq'];?>"></td>
                <td><?php echo $eq['eq_units']; ?></td>
                <td><input type="checkbox" name="id_other<?php echo $eq['id_eq'];?>"></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5" align="center">
                <input type="submit" name="submit" value="Сохранить">
                <input type="submit" name="submit" value="Закончить">
            </td>
        </tr>
    </table>
</form>

<?php include ROOT . '/views/layouts/footer.php'; ?>
