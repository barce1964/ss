<?php include ROOT . '/views/layouts/header.php'; ?>

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

<table class="table">
    <tr>
        <td>
            <div class="dropdown">
                <?php if (is_array($prjList)): ?>
                    <?php foreach ($prjList as $prj): ?>
                        <?php if ($prj['id_project'] == $id_ord): ?>
                            <button class="dropbtn"><?php echo $prj['name_project']; ?></button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="dropdown-content">
                        <?php foreach ($prjList as $prj): ?>
                            <a href="/projects/ready/<?php echo $prj['id_project']; ?>">
                                <?php echo $prj['name_project']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </td>
        <?php if (is_array($prjList)): ?>
            <?php foreach ($prjList as $prj): ?>
                <?php if ($prj['id_project'] == $id_ord): ?>
                    <td>
                        Объект: <?php echo $prj['name_place']; ?>
                    </td>
                    <td>
                        Дата: <?php echo $prj['ord_date']; ?>
                    </td>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </tr>
</table>

<table class="table-bordered table-striped table">
    <tr>
        <th>Наименование</th>
        <th>Количество</th>
        <th>Единица измерения</th>
        <th>Взято с другого объекта</th>
        <th>Объект</th>
    </tr>

    <?php foreach ($prjDetail as $eq): ?>
        <tr>
            <td><?php echo $eq['name_eq']; ?></td>
            <td><?php echo $eq['eq_quantity']; ?></td>
            <td><?php echo $eq['eq_units']; ?></td>
            <td></td><td></td>
        </tr>
    <?php endforeach; ?>
    
</table>

<?php include ROOT . '/views/layouts/footer.php'; ?>