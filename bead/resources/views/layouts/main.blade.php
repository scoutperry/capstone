<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'WAM Project Matrix')</title>
    <meta charset='utf-8'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <!--<link href=data:, rel=icon>-->
    <link href='/css/bead.css' type='text/css' rel='stylesheet'>

    @yield('head')
</head>

<body>
    <header>
        <h1>WAM Project Matrix</h1>
        <p>Project management for the Worcester Art Museum</p>

        {{-- <nav>
            <ul class="nav">
                <li><a href='/'>Home</a></li>
                <li><a href='/projects'>Projects</a></li>
                <li><a href='/projects/create'>Create</a></li>
                <li><a href='/projects'>View</a></li>
                <li><a href='/projects/edit'>Edit</a></li>
                <li><a href='/directory'>Directory</a></li>
                <li><a href='/account'>Account</a></li>
            </ul>
        </nav> --}}


        <!---->
        <div class="navbar">
            <a href='/'>Home</a>
            <div class="dropdown">
                <button class="dropbtn"><a href='projects'>Projects</a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href='/projects/create'>Create</a>
                    <a href='/projects/show'>View</a>
                    <a href='/projects/edit'>Edit</a>
                </div>
                <a href='/directory'>Directory</a>
                <a href='/account'>Account</a>
            </div>
        </div>

        <section>
            @yield('content')
        </section>


</body>

</html>
