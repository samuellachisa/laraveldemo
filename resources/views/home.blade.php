<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); font-family: 'Roboto', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; overflow: hidden;">

    <div style="background: rgba(255, 255, 255, 0.9); padding: 40px 50px; border-radius: 20px; box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; text-align: center; position: relative; z-index: 2; backdrop-filter: blur(10px); transition: transform 0.3s ease;">
        <h2 style="margin-bottom: 30px; color: #333; font-size: 36px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">Register</h2>

        <form action="/register" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            <input name="name" type="text" placeholder="Full Name" required style="padding: 15px; font-size: 18px; border: 2px solid #4CAF50; border-radius: 10px; outline: none; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <input name="email" type="email" placeholder="Email Address" required style="padding: 15px; font-size: 18px; border: 2px solid #4CAF50; border-radius: 10px; outline: none; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <input name="password" type="password" placeholder="Password" required style="padding: 15px; font-size: 18px; border: 2px solid #4CAF50; border-radius: 10px; outline: none; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

            <button type="submit" style="padding: 15px; font-size: 18px; border: none; border-radius: 10px; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1); transform: translateY(0);">Register</button>
        </form>

        <div style="position: absolute; top: 15px; left: -60px; width: 150px; height: 150px; background-color: rgba(255, 255, 255, 0.15); border-radius: 50%; animation: animateCircle 6s infinite; z-index: -1;"></div>
        <div style="position: absolute; bottom: 20px; right: -60px; width: 150px; height: 150px; background-color: rgba(255, 255, 255, 0.15); border-radius: 50%; animation: animateCircle 6s infinite 2s; z-index: -1;"></div>
    </div>

    <style>
        @keyframes animateCircle {
            0% {
                transform: scale(1) translateY(0);
            }

            50% {
                transform: scale(1.5) translateY(20px);
            }

            100% {
                transform: scale(1) translateY(0);
            }
        }
    </style>

</body>

</html>