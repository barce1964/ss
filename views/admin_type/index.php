<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Типы оборудования</li>
                </ol>
            </div>

            <a href="/admin/type/create" class="btn btn-default back"><i class="fa fa-plus"></i>Добавить тип оборудования</a>
            
            <h4>Список типов оборудования</h4>

            <br/>

            <table class="table-bordered table-striped">
                <tr>
                    <th>Тип оборудования</th>
                    <th></th>
                </tr>
                <?php foreach ($typeList as $type): ?>
                    <tr>
                        <td><?php echo $type['name_type']; ?></td>
                        <td><a href="/admin/type/update/<?php echo $type['id_type']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
