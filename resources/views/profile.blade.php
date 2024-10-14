<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>profil</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #dddddd;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container{
            background-color: #ffffff;
            display: grid;
            height: 500px;
            width: 400px;
            margin: auto;
            margin-top: 50px;
            border-radius: 25px;
            box-shadow: 0 5px 9px rgba(0, 0, 0, 0.1);
        }
        .gambar{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .gambar img{
            width: 70%;
            height: 70%;
            object-fit: cover;
            border-radius: 50%;
        }
        .profil{
            display: flex;
            flex-direction: column;
            width: 100%;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="gambar">
            <img src="../{{ $user->foto }}" alt="">
        </div>
        <div class="profil">
            <h3>{{$user->nama}}</h3>
            <h3>{{$user->npm}}</h3>
            <h3>{{$user->nama_kelas ?? 'Kelas tidak ditemukan'}}</h3>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
