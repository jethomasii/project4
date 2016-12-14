<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Project4 Task Manager' --}}
        @yield('title','Project4 Task Manager')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <header>

    </header>

    <nav>
      <ul>
        @if(Auth::check())
          <li><a href='/'>Home</a></li>
          <li><a href='/tasks'>Tasks</a></li>
          <li><a href='/logout'>Logout</a></li>
        @else
          <li><a href='/'>Home</a></li>
          <li><a href='/login'>Login</a></li>
          <li><a href='/register'>Register</a></li>
        @endif
      </ul>
    </nav>


    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
