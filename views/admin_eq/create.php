<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/eq">Оборудование</a></li>
                    <li class="active">Добавить оборудование</li>
                </ol>
            </div>


            <h4>Добавить новое оборудование</h4>

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
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Тип оборудования</p>
                        <select name="id_type">
                            <?php if (is_array($typeList)): ?>
                                <?php foreach ($typeList as $type): ?>
                                    <option value="<?php echo $type['id_type']; ?>">
                                        <?php echo $type['name_type']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br><br>
                        <p>Наименование</p>
                        <input type="text" name="name_eq" placeholder="" value="">
                        
                        <p>Единица измерения</p>
                        <input type="text" name="eq_units" placeholder="" value="">

                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>