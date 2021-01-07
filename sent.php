<?php @include('master/header.php'); ?>
<?php
$cn = mysqli_connect(Host, UN, PW, DBname);
$qry = mysqli_query($cn, "select m.id,content,fullname,created_at from messages m join users u on (m.to_id=u.id) where from_id=$user_id order by id desc");
?>
<main class="flex-shrink-0">

    <div class="container">
        <div class="py-5">
            <?php @include('view_error.php'); ?>

            <ul class="list-group">
                <?php
                while ($arr = mysqli_fetch_array($qry)) {
                ?>
                    <li class="list-group-item  justify-content-between align-items-center">
                        <span class="badge bg-primary">
                            <?= $arr[2] ?>
                        </span>
                        <span>
                            <a style="float: right;" class="btn btn-danger btn-small mx-1" href="process/delete_proc.php?mid=<?= $arr[0] ?>">Delete</a>
                            <a style="float: right;" class="btn btn-warning btn-small mx-1" href="edit.php?mid=<?= $arr[0] ?>">Edit</a>
                            <small style="float: right;" class="p-2 diff"><?= $arr[3] ?></small>
                        </span><br>
                        <p style="word-wrap: break-word;"> <?= $arr[1] ?></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php if ($qry->num_rows == 0) { ?>
            <div class="py-2">
                <div class="alert alert-info" role="alert">
                    No messages
                </div>
            </div>
        <?php } ?>
    </div>

</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="js/diffForHuman.js"></script>


<?php @include('master/footer.php'); ?>