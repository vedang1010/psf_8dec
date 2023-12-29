<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body {
            background-color: #131b3d;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .cardBox {
            width: 350px;
            height: 50vh;
            position: relative;
            margin: auto;
            margin-top: 20vh;
            justify-content: center;
            display: flex;
            place-items: center;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 10px 0px, rgba(0, 0, 0, 0.5) 0px 2px 25px 0px;
        }

        .card {
            width: 95%;
            height: 95%;
            position: absolute;
            background: #000814;
            border-radius: 20px;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            overflow: hidden;
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.4) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.5) 0px 18px 36px -18px inset;
        }

        .card .still {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            font-weight: 800;
            pointer-events: none;
            opacity: 0.5;
        }

        .still {
            transition: 0.5s ease-in-out;
        }

        .head {
            font-size: 1.5rem;
        }

        .card .content .login {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .card .content {
            font-size: 14px;
            line-height: 1.4em;
        }

        .card .content {
            transform: translateY(100%);
            opacity: 0;
            transition: 0.3s ease-in-out;
        }

        .card:hover .content {
            transform: translateY(0);
            opacity: 1;
        }

        .card:hover .still {
            opacity: 0;
        }

        .cardBox::before {
            content: "";
            position: relative;
            width: 50%;
            height: 150%;
            background: #40e0d0;
            background: -webkit-linear-gradient(to right, #ff0080, #ff8c00, #40e0d0);
            background: linear-gradient(to right, #ff0080, #ff8c00, #40e0d0);
            transform-origin: center;
            animation: glowing 6s linear infinite;
        }

        @keyframes glowing {
            0% {
                transform: rotate(0);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .content {
            padding: 20px;
        }

        .form-inp {
            padding: 11px 25px;
            background: transparent;
            border: 1px solid #ffffff;
            line-height: 1;
            border-radius: 8px;
        }

        .form-inp:focus {
            border: 1px solid #00ffdd;
        }

        .form-inp:first-child {
            margin-bottom: 15px;
        }

        .form-inp input {
            width: 100%;
            background: none;
            font-size: 16px;
            color: #ffffff;
            border: none;
            padding: 0;
            margin: 0;
        }

        .form-inp input:focus {
            outline: none;
        }

        #submit-button-cvr {
            margin-top: 20px;
        }

        #submit-button {
            display: block;
            width: 100%;
            color: #00ffdd;
            background-color: transparent;
            font-weight: 600;
            font-size: 14px;
            margin: 0;
            padding: 14px 13px 12px 13px;
            border: 0;
            outline: 1px solid #00ffdd;
            border-radius: 8px;
            line-height: 1;
            cursor: pointer;
            transition: all ease-in-out 0.3s;
        }

        #submit-button:hover {
            transition: all ease-in-out 0.3s;
            background-color: #00ffdd;
            color: #1f1f1f;
            cursor: pointer;
        }

        @media screen and (max-width: 1200px) {
            .cardBox {
                width: 80%;
                max-width: 350px;
                height: 50vh;
                max-height: 400px;
                position: relative;
                margin: auto;
                margin-top: 20vh;
            }
        }
    </style>
</head>
<body>
    <div class="cardBox">
        <div class="card">
            <div class="still">
                <p class="head">PSF'24</p>
                <br />OPS<br />Login
            </div>
            <div class="content">
                <div class="login">
                    <form id="form" action="login_ops.php" method="POST">
                        <div id="form-body">
                            <div id="input-area">
                                <div class="form-inp">
                                    <input type="text" name="username" id="username" placeholder="Username" required>
                                </div>
                                <br />
                                <div class="form-inp">
                                    <input type="password" name="password" id="password" required placeholder="Password">
                                </div>
                                <br />
                            </div>
                            <div id="submit-button-cvr">
                                <input type="submit" name="login" value="Login" id="submit-button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
