<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Oscar data upload</title>
</head>
<body>
<div class="container-md border p-5 m-5 rounded">
    <div class="row gy-4">
        <h1>Nahrajte data soubory</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <label for="actress-data" class="input-group-text"><strong>Herečky s Oscary</strong></label>
                <input id="actress-data" name="actress-data" type="file" accept=".csv" required class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <label for="actor-data" class="input-group-text"><strong>Herci s Oscary</strong></label>
                <input id="actor-data" name="actor-data" type="file" accept=".csv" required class="form-control"/>
            </div>
            <button class="btn btn-primary" type="submit">Nahrat soubory</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
