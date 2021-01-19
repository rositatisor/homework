<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sodinimas</title>
    <link rel="stylesheet" href="http://localhost/homework/agurkai-oop-js/css/reset.css">
    <link rel="stylesheet" href="http://localhost/homework/agurkai-oop-js/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" defer integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/homework/agurkai-oop-mvc/js/app.js" defer></script>
    <script>const apiUrl = 'http://localhost/homework/agurkai-oop-mvc/sodinimas';</script>
</head>
<body>
    <div class="container">
        <h1>Daržovių sodas</h1>
        <div class="nav">
            <a class="sodinimas" href="sodinimas">Sodinimas</a>
            <a class="auginimas" href="auginimas">Auginimas</a>
            <a class="skynimas" href="skynimas">Skynimas</a>
        </div>
        <div class="form">
            <div id="error"></div>
            <div id="list"></div>
            <button class="sodinti agurka" type="button">Sodinti agurką</button>
            <button class="sodinti zirni" type="button">Sodinti žirnį</button>
        </div>
            <input class="agurkas" type="text" name="sodinti-agurka" id="cucumber">
            <input class="zirnis" type="text" name="sodinti-zirni" id="pea">
    </div>
    <script>
        let allNav = document.querySelectorAll('a');
        sessionStorage.setItem("navClicked", 0);
        let isNavClicked = sessionStorage.getItem("navClicked");
        if (isNavClicked) {
            allNav[0].classList.add('clicked');
        }
    </script>
</body>
</html>