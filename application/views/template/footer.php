<!-- Footer -->
<footer>
    <div class="footer">
        <ul>
            <li style="padding: 10px;"><a href="/PrivacyPolicy.html">Privacy Policy</a></li>
            <li style="padding: 10px;">Cookie Policy</li>
            <li style="padding: 10px;">Terms & Conditions</li>
            <li style="padding: 10px;float: right;">Copyright © 2023 WAPS</li>
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
    /* THEME */
    html {
    font-family: sans-serif;
    background-color: #FFFFFF;
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    /* IE and Edge */
    }

    body {
    margin: 0;
    padding: 0;
    border: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    }

    /* Navigation - WITH BURGER */
    header {
        top: 0;
        width: 100%;
        position: sticky;
        margin-left: auto;
        margin-right: auto;
    }

    .topnav {
      overflow: hidden;
      background-color: #D9D9D9;
        display: flex;
        align-items: center;
       
    }
    
    .topnav a{
      display: block;
      text-align: center;
      text-decoration: none;
      font-size: 20px;
    }

    .topnav a #logo{
      float: left;
      display: block;
      text-align: center;
      text-decoration: none;
      font-size: 20px;
    }
    
    .topnav .icon {
      display: none;
      color: black;
    }

    .icon
    {
        position: relative;
        right: 80px;
    }
    
    /* RESPONSIVE - BURGER */
    @media screen and (max-width: 1000px) and (min-width: 300px) 
    {
      .topnav a
      {
        display: none;
      }

      #logo
      {
        display: flex;
      }

      .topnav a.icon 
      {
        float: right;
        display: block;
        position: relative;
        right: 80px;
      }
    }
    
    @media screen and (min-width: 300px) 
    {
      .topnav.responsive{
        position: relative;
      }

      .topnav.responsive .icon {
        right: 0;
        top: 0;
        position: relative;
        right: 80px;
      }
      
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: center;
      }
    }

    @media screen and (max-width: 1000px) 
    {
        .topnav.responsive {
        position: relative;
      }

      .topnav.responsive .icon {
        right: 0;
        top: 0;
        position: relative;
        right: 80px;
      }

      .topnav.responsive a {
        float: none;
        display: block;
        text-align: center;
      }
    }

    /* NAVIGATION - DESIGN */
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        margin-left: auto;
        margin-right: auto;
    }

    li {
        float: left;
    }

    li a,
    .dropbtn {
        display: inline-block;
        color: rgb(75, 61, 38);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover,
    .dropdown:hover .dropbtn {
        background-color: #B19090;
        
    }

    li .dropdown {
        display: inline-block;
    }

    #logo
    {
        width: auto;
        position: relative;
        left: 60px;
    }

    .dropdown-content {
        display: none;
        position: fixed;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        font-size: 1rem;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* FOOTER */
    footer {
        padding: 1px 0;
        height: 40px;
        width: 100%;
        background-color: #EEEEEE;
        position: absolute bottom;
        margin-top: auto;
    }

    footer li a
    {
        text-decoration: none;
        display: inline;
    }

    /* EXTRAS */
        ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;

    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #B19090;

    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #776161;
    }
    </style>