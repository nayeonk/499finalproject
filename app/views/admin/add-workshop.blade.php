<html>
    <head>
        <title>Add a workshop</title>
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
                        <li><a href="dashboard">Home</a></li>
                        <li class="active"><a href="add-workshop">Add Workshop</a></li>
                        <li><a href="orders">View Orders</a></li>
                        <li ><a href="add-user">Add new user</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>

                    <div class="row">
                        <div class="col-md-12">
                            <h2>Add a workshop</h2>
                            <form action="<?php echo url('add-workshop-process') ?>" method="post">
                                Title: <input type="text" name="title"/>
                                Type: <select name="type">
                                    @foreach ($types as $type)
                                    <option value="{{$type->id}}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                                Speaker: <select name="speaker">
                                    @foreach ($speakers as $speaker)
                                    <option value="{{$speaker->id}}"> {{ $speaker->firstname }} {{ $speaker->lastname }}</option>
                                    @endforeach
                                </select>
                                Location: <select name="location">
                                    @foreach ($locations as $location)
                                    <option value="{{$location->id}}"> {{ $location->location }}</option>
                                    @endforeach
                                </select>
                                Day: <select name="day">
                                    @foreach ($days as $day)
                                    <option value="{{$day->id}}"> {{ $day->day }}</option>
                                    @endforeach
                                </select>
                                Time: <select name="time">
                                    @foreach ($times as $time)
                                    <option value="{{$time->id}}"> {{ $time->time }}</option>
                                    @endforeach
                                </select>
                                Price: $<input type="text" name="price" style="width:80px;">
                                <button type="submit" class="btn btn-default">
                                    Submit
                                </button>
                            </form>
                            <?php if (Session::has('success')) : ?>
                                <p style="color: green;">
                                    <?php echo Session::get('success') ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
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