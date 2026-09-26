<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login — NANG ENDI?</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;

            background: #f5f3ee;
            color: #171717;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }


        .login-wrapper {
            width: 100%;
            max-width: 430px;
        }


        .logo {
            margin-bottom: 50px;

            font-size: 30px;
            font-weight: 900;

            letter-spacing: -1.5px;
        }


        .eyebrow {
            margin-bottom: 15px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;
            text-transform: uppercase;
        }


        h1 {
            margin-bottom: 35px;

            font-size: 64px;
            line-height: .9;

            letter-spacing: -4px;
        }


        .message {
            padding: 14px 16px;

            margin-bottom: 20px;

            border: 1px solid #171717;

            font-size: 12px;
            line-height: 1.5;
        }


        .form-group {
            margin-bottom: 20px;
        }


        label {
            display: block;

            margin-bottom: 8px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1.5px;
            text-transform: uppercase;
        }


        input {
            width: 100%;

            padding: 16px;

            border: 1px solid #171717;

            background: transparent;

            color: #171717;

            font-size: 14px;

            outline: none;
        }


        input:focus {
            background: #fff;
        }


        .login-button {
            width: 100%;

            margin-top: 10px;

            padding: 17px 20px;

            border: 1px solid #171717;

            background: #171717;
            color: #fff;

            font-size: 11px;
            font-weight: 800;

            letter-spacing: .5px;

            text-transform: uppercase;

            cursor: pointer;
        }


        .login-button:hover {
            opacity: .8;
        }


        .back-link {
            display: inline-block;

            margin-top: 25px;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .back-link:hover {
            text-decoration: underline;
        }

    </style>

</head>


<body>


    <main class="login-wrapper">


        <div class="logo">
            NANG ENDI?
        </div>


        <div class="eyebrow">
            ADMINISTRATION
        </div>


        <h1>
            LOGIN.
        </h1>


        <?php if (session()->getFlashdata('error')): ?>

            <div class="message">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>


        <?php if (session()->getFlashdata('success')): ?>

            <div class="message">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>

        <?php endif; ?>


        <form
            action="<?= base_url('admin/login') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= old('username') ?>"
                    placeholder="Masukkan username"
                    autocomplete="username"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login Admin →
            </button>

        </form>


        <a
            href="<?= base_url('/') ?>"
            class="back-link"
        >
            ← Kembali ke Portal
        </a>


    </main>


</body>

</html>