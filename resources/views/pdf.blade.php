<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" http-equiv="content-type" content="text/html" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes"/>
        <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/3/31/Webysther_20160423_-_Elephpant.svg" type="image/png" sizes="16x16" />
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous" defer></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
        <script src="https://kit.fontawesome.com/ec29234e56.js" crossorigin="anonymous" defer></script>
        <style>
            * {
                padding: 0;
                margin: 0;
            }

            p {
                padding: 0;
                margin: 0;
            }

            body {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                min-height: 100vh;
                grid-template-rows: 50px minmax(calc(100vh - 80px), auto) 30px;
            }

            header, footer {
                grid-column: 1/6;
                display: flex;
                flex-flow: row nowrap;
                align-items: center;
                justify-content: center;
                background-color: red;
                color: white;
            }

            main {
                grid-column: 1/6;
            }
        </style>
        <title>PHP</title>
    </head>
    <body class="container-fluid">
        <header>
            <h1>Holiday Plan</h1>
        </header>
        <main>
            <h2><b><?=$holiday['title']?></b></h2>
            <p><b>Data: </b> <?=$holiday['date']?></p>
            <p><b>Location: </b><?=$holiday['location']?></p>
            <p><b>Description: </b><?=$holiday['description']?></p>
            <p><b>Participants: </b>
            <ol>
                <?php
                    foreach ($holiday['participants'] as $key => $participant) { ?>
                        <li>
                            <?= $participant ?>
                        </li>
                <?php } ?>
            </ol>
            </p>
        </main>

        <footer>
            <small>PDF</small>
        </footer>
    </body>
</html>
