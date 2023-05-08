<footer>
  <div class="footer">
    <ul>
      <li style="padding: 5px;"><a href="<?= base_url('normal') ?>">Privacy Policy</a></li>
      <li style="padding: 5px;"><a href="<?= base_url('normal') ?>">Cookie Policy</a></a></li>
      <li style="padding: 5px;"><a href="<?= base_url('normal') ?>">Terms & Conditions</a></li>
      <li style="padding: 20px; float: right;">Copyright © 2023 WAPS</li>
    </ul>
  </div>
</footer>

<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>
</body>
</html>