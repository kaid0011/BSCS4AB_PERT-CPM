</body>
<footer>
  <div class="footer">
    <ul class="row1">
      <li><a href="<?= base_url('aboutwaps') ?>">About WAPS</a></li>
      <li><a href="<?= base_url('aboutus') ?>">About Us</a></li>
      <li><a href="<?= base_url('contactus') ?>">Contact Us</a></li>
      <li style="float: right;"><a href="<?= base_url('policy/privacypolicy') ?>">Privacy Policy</a></li>
      <li style="float: right;"><a href="<?= base_url('policy/cookiepolicy') ?>">Cookie Policy</a></a></li>
      <li style="float: right;"><a href="<?= base_url('policy/termsandconditions') ?>">Terms & Conditions</a></li>
    </ul>
    <ul class="copyright">
    <li>Copyright © 2023 WAPS</li>
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
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src="<?= base_url() ?>/assets/js/go.js"></script>
</html>