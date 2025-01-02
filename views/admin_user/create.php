<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/user">Пользователи</a></li>
                    <li class="active">Добавить пользователя</li>
                </ol>
            </div>


            <h4>Добавить нового пользователя</h4>

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
                                <p>Ник</p>
                                <input type="text" name="name" placeholder="" value="">

                                <p>Имя</p>
                                <input type="text" name="firstname" placeholder="" value="">

                                <p>Фамилия</p>
                                <input type="text" name="lastname" placeholder="" value="">

                                <p>Пароль</p>
                                <input type="password" name="pwd" placeholder="" value="">

                                <p>Повторить пароль</p>
                                <input type="password" name="pwd2" placeholder="" value="">

                                <br>

                                <p>Роли</p>
                                <select name="id_role"> 
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?php echo $role['id_role']; ?>"
                                            <?php if ($role['id_role'] == 6): ?>
                                                selected
                                            <?php endif; ?>>
                                            <?php echo $role['name_role']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                                <br><br>

                                <p>Город</p>
                                <select name="id_city">
                                    <option value="1" selected>Алматы</option>
                                    <option value="2">Астана</option>
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
