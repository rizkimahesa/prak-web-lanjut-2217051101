<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #8B0000;
        }

        .profile-container {
            background-color: #00BFFF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 300px;
            text-align: center;
        }

        .profile-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
        }

        .profile-container .info {
            background-color: #f0f0f0;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            text-align: left;
            font-size: 16px;
        }

        .profile-container .info strong {
            color: #333;
        }

        .profile-container .info span {
            margin-left: 10px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <img src="{{ asset($user->foto) }}" alt="foto-profile">
        <div class="info">
            <strong>Nama:</strong> {{ $user->nama }}
        </div>
        <div class="info">
            <strong>Kelas:</strong> {{ $user->nama_kelas }}
        </div>
        <div class="info">
            <strong>IPK:</strong> {{ $user->ipk }}
        </div>
        <button class="bg-red-300 flex w-1/3 font-semibold text-gray-700 text-center rounded-lg">
            <a href="/user" class="w-full">< Back</a>
        </button>
    </div>
</body>

</html>
