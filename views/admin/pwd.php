<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Сменить пароль</li>
                </ol>
            </div>


            <h4>Сменить пароль</h4>

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
                                <p>Пароль</p>
                                <input type="password" name="userPwd" placeholder="" value="">

                                <p>Повторить пароль</p>
                                <input type="password" name="repPwd" placeholder="" value="">

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
