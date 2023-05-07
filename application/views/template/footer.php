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

    /* Navigation */
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
      margin: 0 auto;
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
    
    @media screen and (max-width: 1000px) and (min-width: 300px) 
    {
      .topnav
      {
        overflow: hidden;
        background-color: #D9D9D9;
        display: grid;
        align-items: center;
        justify-content: center;
        align-content: center;
        justify-items: center;
      }

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
      }
    }
    
    @media screen and (min-width: 300px) 
    {
        .topnav.responsive 
    {
        position: relative;
    }
      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }

    }

    @media screen and (max-width: 1000px) 
    {
      .topnav.responsive 
      {
        position: relative;
      }
      .topnav.responsive .icon 
      {
        position: absolute;
        right: 0;
        top: 0;
      }
      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
      }
      li 
      {
          float: left;
      }

      .footer
      {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          background: #D9D9D9;
          height: auto;
          width: 100vw;
          padding-bottom: 5px;
      }

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
        display: contents;
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