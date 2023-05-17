</body>
<footer>
  <div class="footer">
    <ul>
      <li><a href="<?= base_url('policy/privacypolicy') ?>">Privacy Policy</a></li>
      <li><a href="<?= base_url('policy/cookiepolicy') ?>">Cookie Policy</a></a></li>
      <li><a href="<?= base_url('policy/termsandconditions') ?>">Terms & Conditions</a></li>
      <li style="float: right;">Copyright © 2023 WAPS</li>
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
<script src="<?= base_url() ?>/assets/js/go.js"></script>
</html>