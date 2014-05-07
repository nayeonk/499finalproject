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
                        <h3>DASHBOARD</h3>
                    </div>
                </div>
                <ul class="nav nav-pills">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="add-workshop">Add Workshop</a></li>
                    <li><a href="orders">View Orders</a></li>
                    <li><a href="add-user">Add new user</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>

                <div class="row">
                    <div class="col-md-12">
                        <div style="margin-top:20px; padding-top:10px; padding-bottom:10px; background-color:lightgoldenrodyellow;">
                            <strong>Total Orders: </strong> {{$totalPurchased}} <br/>
                            <strong>Total Revenue: </strong> ${{$revenue}}
                        </div>
                        <h3>All current workshops</h3>
                        <table border="0" class="table table-striped table-hover">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Speaker</th>
                                <th>Location</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Type</th>
                            </tr>
                            @foreach($workshops as $workshop)
                            <tr>
                                <td> {{ $workshop->id }} </td>
                                <td> {{ $workshop->title }}</td>
                                <td> {{ $workshop->speaker->firstname }} {{ $workshop->speaker->lastname }}</td>
                                <td> {{ $workshop->location->location }}</td>
                                <td> {{ $workshop->day->day }}</td>
                                <td> {{ $workshop->time->time }}</td>
                                <td> ${{ $workshop->price }}</td>
                                <td> {{ $workshop->type->type }}</td>
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