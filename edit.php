<?php @include('master/header.php'); ?>
<?php
if (!isset($_GET['mid']))
    header("location:/guestbook/index.php");

$mid = $_GET['mid'];
$cn = mysqli_connect(Host, UN, PW, DBname);

$qry = mysqli_query($cn, "select from_id from messages where id=$mid");
$arr = mysqli_fetch_array($qry);
if($user_id!=$arr[0])
{
    
  
    $_SESSION["error"] = "Unauthorized action";
    header("location:sent.php");
    die;
}

$qry = mysqli_query($cn, "select m.id,u.id,content,fullname from messages m join users u on (m.from_id=u.id) where m.id=$mid");
$arr = mysqli_fetch_array($qry)
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<main class="flex-shrink-0">
    <div class="container">
        
        <form method="post" class="py-5" action="process/update_proc.php">
            <div class="col-md-7 col-lg-8 ">
                <?php @include('view_error.php'); ?>
                <h4 class="mb-3">Edit message</h4>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">To:</label>
                    <input hidden name="mid" value="<?= $mid ?>">
                    <input type="text" class="form-control" value="<?= $arr[3] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" name="inputMessage" rows="3" required><?= $arr[2]?></textarea>
                </div>
                <div class="mb-3">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
</script>

<?php @include('master/footer.php'); ?>