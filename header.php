<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
    <head>
        <script type="text/javascript" src="./script.js"></script>
        <TITLE> Chris Diel </TITLE>
        <LINK REL="SHORTCUT ICON" HREF="http://chrisdiel.com/favicon.ico">
        <!--                    CSS files                  -->
        <link rel="stylesheet" type="text/css" href="./main.css" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="./normalize.css"> -->
        <script src="/jquery-1.11.1.min.js"></script>
        <script src="/showlogin.js"></script>
    </head>
    <BODY>
        <?php
        include_once('user_auth_fns.php');
        include_once('data_valid_fns.php');
        include_once('admin_fns.php');
        include_once('User_fns.php');
        include_once('output_fns.php');
        include_once('order_fns.php');
        @session_start();
        if (@!$_SESSION['Llogin']) {
            if ((isset($_SESSION['admin'])) || (isset($_SESSION['user']))) {
                $_SESSION['Llogin'] = "It's your first time!";
            }
        }
        ?>
        <div id="container">
            <div id="BackGrad"></div>
            <div id="header">
                <div class="TopBarThing">

                    <!-- Header Logo top Left -->
                    <a STYLE="text-decoration: none" href="index.php">
                        <div id="HeaderLogo"><div class="HeaderLogoCorner"></div>
                            <span class="HeaderLogoText">Chris Diel</span>
                        </div>
                    </a>

                    <div class="LoginMenu">


<?php
    if ((isset($_SESSION['admin'])) || (isset($_SESSION['user']))) {
?>

                            <a style="text-decoration:none" href="logout.php"><span class="LogInLink LogInHide">Log Out</span></a>
                            <?php
                        } else {
                            ?>


                            <a style="text-decoration:none" href="login.php"><span class="LogInLink LogInHide">Log In</span></a>


                            <?php
                        }
                        ?>

                    </div>

                </div>
            </div>

            <div id="body">
                <!--Google Tracking Bullshit-->
                <script>
                    (function(i, s, o, g, r, a, m) {
                        i['GoogleAnalyticsObject'] = r;
                        i[r] = i[r] || function() {
                            (i[r].q = i[r].q || []).push(arguments)
                        }, i[r].l = 1 * new Date();
                        a = s.createElement(o),
                                m = s.getElementsByTagName(o)[0];
                        a.async = 1;
                        a.src = g;
                        m.parentNode.insertBefore(a, m)
                    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                    ga('create', 'UA-49131767-1', 'sinuath.com');
                    ga('send', 'pageview');

                </script>
                <!--Google Tracking Bullshit-->
<?php
//  }
?>

<?php
if (isset($_SESSION['admin'])) {
    display_admin_menu(); //output_fns.php
} else if (isset($_SESSION['user'])) {
    display_user_menu();
} else {
    display_public_menu();
}
?>
