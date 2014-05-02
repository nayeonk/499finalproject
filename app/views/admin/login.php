<html>
<head>
    <title>Login</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"/>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wrapper">
                <h2>Admin Login</h2>
                <form method="post" action="<?php echo url('login-process') ?>">
                    Username: <input type="text" name="username" /> <br/>
                    Password: <input type="password" name="password" />
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>