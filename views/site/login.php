<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-3 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li id="blink1"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                
                <div class="signup-form"><!--sign up form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Ник" value="<?php echo $name; ?>"/>
                        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
                        <table class="wrapper-btn">
                            <tr><td>
                                <input type="submit" name="submit" class="btn btn-default f-btn" value="Вход" />
                            </td>
                            <td>
                                <input type="submit" name="cancel" class="btn btn-default f-btn" value="Отмена" />
                            </td></tr>
                        </table>
                    </form>
                </div><!--/sign up form-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>