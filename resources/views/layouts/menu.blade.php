<li class="nav-item">
    <a href="{{ route('folders.index') }}"
       class="nav-link {{ Request::is('folders*') ? 'active' : '' }}">
        <p>Folders</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('passwords.index') }}"
       class="nav-link {{ Request::is('passwords*') ? 'active' : '' }}">
        <p>Passwords</p>
    </a>
</li>


