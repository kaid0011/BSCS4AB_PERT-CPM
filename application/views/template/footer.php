<!-- Footer -->
<footer>
  <div class="footer">
      <ul>
          <li style="padding: 10px;"><a href="<?= base_url('normal') ?>">Privacy Policy</a></li>
          <li style="padding: 10px;"><a href="<?= base_url('normal') ?>">Cookie Policy</a></a></li>
          <li style="padding: 10px;"><a href="<?= base_url('normal') ?>">Terms & Conditions</a></li>
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

<style>
  /* FOOTER */
  footer 
  {
    width: 100%;
    background-color: #EEEEEE;
    position: absolute bottom;
    margin-top: auto;
  }
  
  footer li a
  {
    text-decoration: none;
  }

  .footer ul 
  {
    list-style-type: none;
    padding: 0;
    overflow: hidden;
    margin-left: auto;
    margin-right: auto;
  }

  footer li 
  {
  float: left;
  }

  footer li a:hover{
      background-color: #B19090;
  }
  
  /* EXTRAS */
  ::-webkit-scrollbar 
  {
    width: 10px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track 
  {
    box-shadow: inset 0 0 5px grey;
  }
  
  /* Handle */
  ::-webkit-scrollbar-thumb 
  {
    background: #B19090;
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover 
  {
    background: #776161;
  }

  @media screen and (max-width: 800px) 
  {

    .footer ul
    {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
    }

    .footer ul li
    {
      line-height: .1rem;
      font-size: .9em;
    }
  }

  @media screen and (max-width: 800px) 
  {
    .footer ul
    {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
    }

    .footer ul li
    {
      line-height: 1rem;
    }
  }
  </style>