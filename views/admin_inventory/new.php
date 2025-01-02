<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li class="active">Новая инвентаризация</li>
    </ol>
</div>

<form action="#" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_inv" value="<?php echo $idInv; ?>">
    <table class="table-bordered table-striped table">
        <tr>
            <th>Тип оборудования</th>
            <th>Наименование</th>
            <th>Количество</th>
            <th>Единица измерения</th>
        </tr>

        <?php foreach ($eqList as $eq): ?>
            <tr>
                <td><?php echo $eq['name_type']; ?></td>
                <td><?php echo $eq['name_eq']; ?></td>
                <td><input type="text" name="quantity<?php echo $eq['id_eq'];?>"></td>
                <td><?php echo $eq['eq_units']; ?><td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
</form>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
