<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script> -->
<style type="text/css">
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #000;
        filter: alpha(opacity=70);
        -moz-opacity: 0.7;
        -khtml-opacity: 0.7;
        opacity: 0.7;
        z-index: 100;
        display: none;
    }

    .cnt223 a {
        text-decoration: none;
    }

    .popup {
        width: 100%;
        margin: 0 auto;
        display: none;
        position: fixed;
        z-index: 101;
    }

    .cnt223 {
        min-width: 600px;
        width: 600px;
        min-height: 150px;
        margin: 100px auto;
        background: #f3f3f3;
        position: relative;
        z-index: 103;
        padding: 15px 35px;
        border-radius: 5px;
        box-shadow: 0 2px 5px #000;
    }

    .cnt223 p {
        clear: both;
        color: #555555;
        /* text-align: justify; */
        font-size: 20px;
        font-family: sans-serif;
    }

    .agree {
        color: blue;
        font-weight: bold;
        float: right;
    }

    .cancel {
        color: #d91900;
        font-weight: bold;
    }

    .cancel:hover,
    .agree:hover {
        cursor: pointer;
    }

    .cnt223 .x {
        float: right;
        height: 35px;
        left: 22px;
        position: relative;
        top: -25px;
        width: 34px;
    }

    .cnt223 .x:hover {
        cursor: pointer;
    }

    @media screen and (max-width: 767px) {
        .cnt223 {
            width: 100vw;
            height: 50vh;
            padding: 0;
            margin: auto;
        }
    }
</style>
<script type='text/javascript'>
    $(function() {
        var overlay = $('<div id="overlay"></div>');
        overlay.show();
        overlay.appendTo(document.body);
        $('.popup').show();
        $('.agree').click(function() {
            $('.popup').hide();
            overlay.appendTo(document.body).remove();
            return false;
        });
        $(".cancel").click(function() {
            // preventDefault();
            window.location.href = ('https://www.google.com/');
        });
    });
</script>
<div class='popup'>
    <div class='cnt223'>
        <h1>Important Notice!!!</h1>
        <h2>By using this site you agree to the site's terms and conditions which can be read <a href="https://fastmovies1.com/terms">here</a></h2>
        <h4>Disclaimer</h4>
        <p>
            Fastmovies1.com does not host any files on it's servers. All files or contents in the website are hosted on third party websites.This site does not accept responsibility for contents hosted on third party websites. Fastmovies1.com just indexes those links which are already available in internet.
        </p>
        <p>
            <br />
            <br />
            <span class='close cancel'>Cancel</span>
            <span class='close agree'>I agree continue to the site</span>

        </p>
    </div>
</div>