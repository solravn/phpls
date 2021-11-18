<!doctype html>
<html class="h-100" lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/style/css/bootstrap.min.css" rel="stylesheet">
    <script src="/style/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<style>
    main {
        background-image: url("/img/gachi-bg.png");
        background-repeat: no-repeat;
        background-position: right;
        height: 80%;
    }

    footer {
        background-color: pink;
        background-image: url("/img/gachiface.png");
        background-size: contain;
        background-position: left;
        background-repeat: no-repeat;
    }

    header > nav {
        background: linear-gradient(180deg, #FE0000 16.66%,
                                            #FD8C00 16.66%, 33.32%,
                                            #FFE500 33.32%, 49.98%,
                                            #119F0B 49.98%, 66.64%,
                                            #0644B3 66.64%, 83.3%,
                                            #C22EDC 83.3%);
    }

</style>
        <body class="d-flex flex-column h-100">

        <header>
            <nav class="navbar navbar-expand-md navbar-light fixed-top bg-danger">
                <div class="container-fluid">
                    <a class="navbar-brand h1" href="/">GayBar</a>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/"><b>Index</b></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <b>User</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/user/">UserIndex</a></li>
                                    <li><a class="dropdown-item" href="/user/view">UserView</a></li>
                                    <li><a class="dropdown-item" href="/user/view/123">UserViewWithId</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-shrink-0 mt-auto ">
                <div class="container">
                    #CONTENT#
                </div>
        </main>

        <footer class="footer py-3">
            <div class="container">
                <span>Футер</span>
            </div>
        </footer>

        </body>
</html>
