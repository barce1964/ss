<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Пользователи</li>
                </ol>
            </div>

            <a href="/admin/user/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить пользователя</a>
            
            <h4>Список пользователей</h4>

            <br/>

            <table class="table-bordered table-striped table table__users">
                <tr>
                    <th>Ник</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Роль</th>
                    <th>Город</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($usersList as $user): ?>
                    <tr>
                        <td><?php echo $user['name_user']; ?></td>
                        <td><?php echo $user['user_firstname']; ?></td>
                        <td><?php echo $user['user_lastname']; ?></td>
                        <td><?php echo $user['name_role']; ?></td>
                        <td><?php echo $user['name_city']; ?></td>
                        <td>
                            <?php if ($user['id_user'] != 1): ?>
                                <a href="/admin/user/update/<?php echo $user['id_user']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($user['id_user'] != 1): ?>
                                <a href="/admin/user/delete/<?php echo $user['id_user']; ?>" title="Удалить"><i class="fa fa-times"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
