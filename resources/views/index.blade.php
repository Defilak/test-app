<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>test-app</title>

    <!-- CSS и JavaScript -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">
                    <img src="/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-middle">
                    Test
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Компании</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/users">useri</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="row">
                @foreach ($cards as $card)
                <div class="col-lg-3 g-3">
                    @component('company_card', $card)
                    @endcomponent
                </div>
                @endforeach
            </div>
        </main>
    </div>

    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</html>
