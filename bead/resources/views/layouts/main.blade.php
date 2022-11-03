<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'WAM Project Matrix')</title>
    <meta charset='utf-8'>
    <!--<link href=data:, rel=icon>-->
    @yield('head')
</head>

<body>
    <header>
        <h1>WAM Project Matrix</h1>
        <p>Project management for the Worcester Art Museum</p>
    </header>

    <nav>
        <ul class="nav">
            <li><a href='/'>Home</a></li>
            <li><a href='/projects'>Projects</a></li>
            <li><a href='/projects/create'>Create</a></li>
            <li><a href='/projects'>View</a></li>
            <li><a href='/projects/edit'>Edit</a></li>
            <li><a href='/directory'>Directory</a></li>
            <li><a href='/account'>Account</a></li>
        </ul>
    </nav>

    <!--<div class="navbar">
        <a href='/'>Home</a>
        <div class="dropdown">
            <button class="dropbtn"><a href='projects'>Projects</a>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href='projects/create'>Create</a>
                <a href='projects/show'>View</a>
                <a href='projects/edit'>Edit</a>
            </div>
            <a href='/directory'>Directory</a>
            <a href='/account'>Account</a>
        </div>
    </div>-->

    <section>
        @yield('content')
    </section>

    <!--<a href='/'><img src='/images/WAM-250px copy.png' id='logo' alt='Bookmark Logo'></a>-->

</body>

</html>
