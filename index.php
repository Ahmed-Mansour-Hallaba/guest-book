<?php @include('master/header.php'); ?>
<?php
$cn = mysqli_connect(Host, UN, PW, DBname);
$qry = mysqli_query($cn, "select * from users where id!=$user_id");
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<main class="flex-shrink-0">
  <div class="container">
    <form method="post" action="process/send_proc.php">
      <div class="col-md-7 col-lg-8 py-5">
        <?php @include('view_error.php'); ?>
        <h4 class="mb-3">Compose message</h4>
        <div class="mb-3">

          <label for="exampleFormControlTextarea1" class="form-label">To:</label>
          <select class="form-control single-select" name="inputTo">
            <?php
            while ($arr = mysqli_fetch_array($qry)) {

            ?>
              <option value="<?= $arr[0] ?>"><?= $arr[1] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Message</label>
          <textarea class="form-control" name="inputMessage" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Send</button>
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