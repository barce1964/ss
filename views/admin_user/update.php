<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/user">Пользователи</a></li>
                    <li class="active">Редактировать пользователя</li>
                </ol>
            </div>


            <h4>Редактировать пользователя</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li id="blink1"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-8">
                <div class="login-form">
                    <form action="#" method="post">

                        <div class="wrapper-user">
                            <div class="wrapper-fields">
                                <p>Ник: <?php echo $user['name_user']; ?></p>

                                <p><?php echo $user['user_firstname'] . '  ' . $user['user_lastname'];?></p>
                                
                                <select name="id_role"> 
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['id_role']; ?>"
                                            <?php if ($role['id_role'] == $role_usr): ?>
                                                selected
                                            <?php endif; ?>>
                                            <?php echo $role['name_role']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <br><br>

                                <p>Город</p>
                                <select name="id_city">
                                    <?php if($user['id_city'] == 1): ?>
                                        <option value="1" selected>Алматы</option>
                                        <option value="2">Астана</option>
                                    <?php else: ?>
                                        <option value="1">Алматы</option>
                                        <option value="2" selected>Астана</option>
                                    <?php endif; ?>
                                </select>

                                <br><br>

                                <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                            </div>

                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
