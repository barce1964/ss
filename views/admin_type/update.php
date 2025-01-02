<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/dep">Типы оборудования</a></li>
                    <li class="active">Редактировать тип обурудования</li>
                </ol>
            </div>


            <h4>Редактировать тип обурудования"<?php echo $type['name_type']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Тип оборудлования</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $type['name_type']; ?>">

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>