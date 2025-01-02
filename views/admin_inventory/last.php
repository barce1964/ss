<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="/admin">Админпанель</a></li>
        <li class="active">Прошлая инвентаризация от <?php echo $dateInventory; ?></li>
    </ol>
</div>

<form action="#" method="post" enctype="multipart/form-data">
    <table class="table-bordered table-striped table">
        <tr>
            <th>Наименование</th>
            <th>Количество</th>
            <th>Единица измерения</th>
        </tr>

        <?php foreach ($invList as $eq): ?>
            <tr>
                <td><?php echo $eq['name_eq']; ?></td>
                <td><?php echo $eq['eq_quantity'];?></td>
                <td><?php echo $eq['eq_units']; ?><td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" name="submit" class="btn btn-default" value="Выйти">
</form>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
