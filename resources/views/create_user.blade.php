<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
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
            display: flex;
            justify-content: center;
            height: 500px;
            width: 400px;
            margin: auto;
            margin-top: 50px;
            border-radius: 25px;
            box-shadow: 0 5px 9px rgba(0, 0, 0, 0.1);
        }
        .formlogin{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }
        .formlogin .forminput{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        button{
            padding: 12px 30px;
            width: 150px;
            margin-top: 20px;
            background-color: #2A629A;
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: bolder;
        }
        button:hover{
            cursor: pointer;
            background-color: #003285;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="formlogin">
            <h1 style="font-size:25px;" class="text-center mb-4">Masukkan Nama, NPM, Kelas</h1>
            <form action="{{ route('user.store') }}" class="forminput" method="post">@csrf
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="nama" placeholder="name@example.com" name="nama">
                    <label for="floatingInput">Nama</label>
                </div>

                @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <div class="input-group mb-4">
                <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    <select class="form-select" id="kelas_id" name="kelas_id">
                        @foreach($kelas as $kelasItem)
                        <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>

                @foreach($errors->get('kelas') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <div class="form-floating m-1">
                    <input type="text" class="form-control" id="npm" placeholder="npm@example.com" name="npm">
                    <label for="floatingInput">NPM</label>
                </div>

                @foreach($errors->get('npm') as $msg)
                <p class="text-danger">error woi</p>
                @endforeach

                <button type="submit" name="login">CREATE</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
