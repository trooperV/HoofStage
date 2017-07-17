    <div class="under-div"></div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="nav">
  <ul>
    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
    <li class="{{ Request::is('blog') ? 'active' : '' }}" ><a href="/blog">Blogs</a></li>
    <li class="{{ Request::is('about') ? 'active' : '' }}" ><a href="/about">About</a></li>
    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>

    @if(Auth::check())
       @if(strlen(Auth::user()->name) > 9)
          <li class="dropdown" style="width:{{ (strlen(Auth::user()->name)+2) * 16 }}px;">
       @else
          <li class="dropdown" style="width:120px;">
       @endif
        <a class="hover2" href="#">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-content" style="float:right; right:0;">
            <a class="hover1" href="{{ route('posts.index') }}">Posts</a>
            <a class="hover1" href="{{ route('categories.index') }}">Categories</a>
            <a class="hover1" href="{{ route('tags.index') }}">Tags</a>
            <a class="hover1" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Logout
            </a>
          </ul>
      </li>
    @else
          <li class="col-md-offset-2"><a href="{{ route('login') }}">Log In</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
    @endif
  </ul>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
      
    </div>
    <br>



