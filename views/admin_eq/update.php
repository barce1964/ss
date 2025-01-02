<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/eq">Оборудование</a></li>
                    <li class="active">Редактировать оборудование</li>
                </ol>
            </div>


            <h4>Редактировать оборудование</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Тип оборудования: <?php echo $eq['name_type'];?></p>
                        <input type="hidden" name="name_type" value="<?php echo $eq['name_type']; ?>">
                        <p>Наименование</p>
                        <input type="text" name="name_eq" placeholder="" value="<?php echo $eq['name_eq']; ?>">
                        <br>
                        
                        <input type="hidden" name="eq_units" placeholder="" value="<?php echo $eq['eq_units']; ?>">

                        <br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>