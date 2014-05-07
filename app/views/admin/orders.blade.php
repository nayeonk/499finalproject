<html>
<head>
    <title>View Orders</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet"/>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 wrapper">
            <div class="row">
                <div class="col-md-12 header">
                    <h3>View All Orders</h3>
                </div>
            </div>
            <ul class="nav nav-pills">
                <li><a href="dashboard">Home</a></li>
                <li><a href="add-workshop">Add Workshop</a></li>
                <li class="active"><a href="orders">View Orders</a></li>
                <li><a href="add-user">Add new user</a></li>
                <li><a href="#">Logout</a></li>
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <table border="0" class="table table-striped table-hover">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Workshop</th>
                            <th>Quantity</th>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td> {{ $order->id }} </td>
                            <td> {{ $order->firstname }}</td>
                            <td> {{ $order->lastname }} </td>
                            <td> {{ $order->email}}</td>
                            <td> {{ $order->workshop['title'] }}</td>
                            <td> {{ $order-> quantity }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>