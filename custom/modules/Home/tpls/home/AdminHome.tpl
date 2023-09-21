<!-- Loader -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loader Animation</title>
    {literal}
    <style type="text/css">
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('custom/themes/default/images/Preloader.gif') center no-repeat #fff;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

    {/literal}
</head>
<body>
    <div class="se-pre-con"></div>
</body>
</html>
{literal}
<script type="text/javascript">
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        sleep(1000);
        $(".se-pre-con").fadeOut("slow");
    });
    function sleep(milliseconds) {
      const date = Date.now();
      let currentDate = null;
      do {
        currentDate = Date.now();
      } while (currentDate - date < milliseconds);
    }
</script>
{/literal}

{literal}
<style>
    .item {
        width: 200px;
        text-align: center;
        display: block;
        background-color: transparent;
        border: 1px solid transparent;
        margin-right: 10px;
        margin-bottom: 1px;
        float: left;
        cursor: pointer;
    }

    .iconcolor {
        color: deepskyblue;
    }

    .iconcolorpink {
        color: deeppink;
    }
</style>
{/literal}
<div>
    <div class="row" style="margin-top:25px;">
        <div class="col-sm-2 hvr-pulse-shrink">
            <div class="item">
                <a href="index.php?module=Home&action=home&view=bookingdashboard"><img src="custom/themes/default/images/listing.jpeg" width="50" height="50"></a>
                <p>Bookings Dashboard</p>
            </div>
        </div>      
    </div>
</div>