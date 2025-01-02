<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/user">Пользователи</a></li>
                    <li><a href="/admin/role">Роли</a></li>
                    <li class="active">Удалить роль</li>
                </ol>
            </div>


            <h4>Удалить роль №<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить эту роль?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>