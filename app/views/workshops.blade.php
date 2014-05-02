<html>
<head>
    <title>Workshops</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet"/>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 wrapper">
                <div class="row">
                    <div class="col-md-12 header">
                        <h3>Workshop Registration</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-8 navbar">
                        <ul class="nav nav-pills">
                            <li><a href="#">Checkout</a></li>
                        </ul>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>The following are workshops available for each day of the festival. Please select the number of tickets you would like for each workshop and click continue to continue the checkout process.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo url('workshops/checkout') ?>" method="post">
                        <h3>Friday, July 25th</h3>
                        <table border="0" class="table table-striped table-hover">
                            <tr>
                                <th>Title</th>
                                <th>Speaker</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Qty</th>

                            </tr>
                            @foreach($fridayWorkshops as $workshop)
                            <tr>
                                <td> {{ $workshop->title }}</td>
                                <td> {{ $workshop->speaker->firstname }} {{ $workshop->speaker->lastname }}</td>
                                <td> {{ $workshop->type->type }}</td>
                                <td> {{ $workshop->location->location }}</td>
                                <td> {{ $workshop->time->time }}</td>
                                <td> ${{ $workshop->price }}</td>
                                <td> <select name="{{ 'workshop' . $workshop->id }}">
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </td>

                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Saturday, July 26th</h3>
                        <table border="0" class="table table-striped table-hover">
                            <tr>
                                <th>Title</th>
                                <th>Speaker</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Qty</th>

                            </tr>
                            @foreach($saturdayWorkshops as $workshop)
                            <tr>
                                <td> {{ $workshop->title }}</td>
                                <td> {{ $workshop->speaker->firstname }} {{ $workshop->speaker->lastname }}</td>
                                <td> {{ $workshop->type->type }}</td>
                                <td> {{ $workshop->location->location }}</td>
                                <td> {{ $workshop->time->time }}</td>
                                <td> ${{ $workshop->price }}</td>
                                <td> <select name="{{ 'workshop' . $workshop->id }}">
                                        <option></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                    </select>
                                </td>

                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <button type="submit" class="btn btn-primary">Proceed to checkout &raquo;</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>