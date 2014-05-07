<html>
<head>
    <title>Add a New User</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet"/>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 wrapper">
            <div class="row">
                <div class="col-md-12 header">
                    <h3>ADD USER</h3>
                </div>
            </div>
            <ul class="nav nav-pills">
                <li><a href="dashboard">Home</a></li>
                <li><a href="add-workshop">Add Workshop</a></li>
                <li><a href="orders">View Orders</a></li>
                <li class="active"><a href="add-user">Add new user</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
            <div class="row">
                <div class="col-md-8">
                    <?php if (Session::has('success')) : ?>
                        <p style="color: green;">
                            <?php echo Session::get('success') ?>
                        </p>
                    <?php endif; ?>
                    <form action="<?php echo url('admin/add-user')?>" method="post">
                        <fieldset>
                            <legend>Add New User</legend>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>