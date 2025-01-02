<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Лабаратории и департаменты</li>
                </ol>
            </div>

            <a href="/admin/dep/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить лабораторию или департамент</a>
            
            <h4>Список лабораторий</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID лаборатории</th>
                    <th>Название лаборатории или департамента</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($depList as $dep): ?>
                    <tr>
                        <td><?php echo $dep['id_dep']; ?></td>
                        <td><?php echo $dep['name_dep']; ?></td>
                        <td><a href="/admin/dep/update/<?php echo $dep['id_dep']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/dep/delete/<?php echo $dep['id_dep']; ?>" title="Удалить"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
