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

    <section>
        @yield('content')
    </section>

    <!--<a href='/'><img src='/images/WAM-250px copy.png' id='logo' alt='Bookmark Logo'></a>-->

</body>

</html>
