<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/user">Пользователи</a></li>
                    <li class="active">Роли</li>
                </ol>
            </div>

            <a href="/admin/role/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить роль</a>
            
            <h4>Список ролей</h4>

            <br/>

            <table class="table-bordered table-striped table table__roles">
                <tr>
                    <th>Название роли</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($rolesList as $role): ?>
                    <tr>
                        <td><?php echo $role['name_role']; ?></td>
                            <td>
                                <?php if ($role['id_role'] != 1):?>
                                    <a href="/admin/role/update/<?php echo $role['id_role']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a>
                                <?php endif;?>
                            </td>
                            <td>
                                <?php if ($role['id_role'] != 1):?>
                                    <a href="/admin/role/delete/<?php echo $role['id_role']; ?>" title="Удалить"><i class="fa fa-trash-o"></i></a>
                                <?php endif;?>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>
