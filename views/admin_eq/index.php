<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Оборудование</li>
                </ol>
            </div>

            <a href="/admin/eq/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить оборудование</a>
            
            <h4>Оборудование</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>Тип оборудования</th>
                    <th>Наименование</th>
                    <th></th>
                    <th></th>
                </tr>
                
                <?php foreach ($eqList as $eq): ?>
                    <tr>
                        <td><?php echo $eq['name_type']; ?></td>
                        <td><?php echo $eq['name_eq']; ?></td>
                        <td><a href="/admin/eq/update/<?php echo $eq['id_eq']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/eq/delete/<?php echo $eq['id_eq']; ?>" title="Удалить"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
