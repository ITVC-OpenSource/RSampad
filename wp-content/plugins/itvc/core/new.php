<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="icon" href="assets/img/favicon.ico">
<?php
include('assets/php/dbconfigndzjg.php');
if (isset($_POST['sub'])) {
  $name = $_POST['name'];
  $year = $_POST['year'];
  $birth = $_POST['birth'];
  $query = "INSERT INTO `HB`(`name`, `year`, `birth`) VALUES ('$name' , '$year' , $birth)";
  $quexe = $wpdb->get_results($query);
  if (!$quexe) {
    echo "خطایی در ثبت دانش آموز به وجود آمد.";
  }else {
    echo "دانش آموز با موفقیت ثبت شد.";
  }
}
?>
<div id="reg" class="reg">
  <center>
    <form class="new" action="" method="post">
      <input dir="rtl" type="text" name="name" placeholder="نام دانش آموز"><br>
      <input dir="rtl" type="text" name="year" placeholder="سال تولد"><br>
      <input dir="rtl" type="text" name="birth" placeholder="ماه و روز تولد"><br>
      <button type="submit" name="sub">ثبت دانش آموز</button><br>
    </form>
  </center>
</div>
