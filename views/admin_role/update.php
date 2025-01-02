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
                    <li class="active">Редактировать роль</li>
                </ol>
            </div>


            <h4>Редактировать роль"<?php echo $role[0]['name_role']; ?>"</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li id="blink1"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Департамент</p>
                        <select name="id_dep">
                            <?php if (is_array($depList)): ?>
                                <?php foreach ($depList as $dep): ?>
                                    <option value="<?php echo $dep['id_dep']; ?>"  
                                        <?php if ($dep['id_dep'] == $role[0]['id_dep']): ?>
                                            selected
                                        <?php endif; ?>>
                                        <?php echo $dep['name_dep']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br><br>

                        <p>Название роли</p>
                        <input type="text" name="name_role" placeholder="" value="<?php echo $role[0]['name_role']; ?>">

                        <br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>