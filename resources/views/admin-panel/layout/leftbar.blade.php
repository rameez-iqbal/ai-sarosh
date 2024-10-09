<div class="sidebar-panel nicescrollbar sidebar-panel-light">
	<ul class="sidebar-menu">
		<li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="{{route('pages')}}"><i class="la la-home"></i> <span> Dashboard </span> </a></li>
		<li class="{{ request()->routeIs('pages') || request()->routeIs('page.create') ? 'active' : '' }}">
			<a href="#">
				<i class="zmdi zmdi-file"></i> <span>Pages </span> <i class="la la-angle-right down-arrow"></i>
			</a>
			<ul class="sidebar-submenu">
				<li class="{{ request()->routeIs('pages') || request()->routeIs('page.create')  ? 'active' : '' }}" ><a href="{{route('pages')}}"><i class="la la-minus"></i> <span> Sections</span> </a></li>
			</ul>
		</li>
		<li class="{{ request()->routeIs('services') || request()->routeIs('services.create') ? 'active' : '' }}">
			<a href="#">
				<i class="la la-briefcase"></i> <span>Service </span> <i class="la la-angle-right down-arrow"></i>
			</a>
			<ul class="sidebar-submenu">
				<li class="{{ request()->routeIs('services') || request()->routeIs('services.create')  ? 'active' : '' }}" ><a href="{{route('services')}}"><i class="la la-minus"></i> <span>Services & Thematic Areas</span> </a></li>
			</ul>
		</li>
		<li class="{{ request()->routeIs('library.types') || request()->routeIs('library.create') ? 'active' : '' }}">
			<a href="#">
				<i class=" zmdi zmdi-book-image"></i> <span>Library </span> <i class="la la-angle-right down-arrow"></i>
			</a>
			<ul class="sidebar-submenu">
				<li class="{{ request()->routeIs('library.types') || request()->routeIs('article.create') || request()->routeIs('webinar') || request()->routeIs('library.create')  ? 'active' : '' }}" >
					<a href="{{route('library.types')}}"><i class="la la-minus"></i> <span>Library Types</span> </a>
				</li>
				<li class="active" >
					<a href="{{route('webinar',['type'=>'articles'])}}"><i class="la la-minus"></i> <span>Articles</span> </a>
				</li>
				<li class="{{ request()->routeIs('webinar') || request()->routeIs('webinar')  ? 'active' : '' }}" >
					<a href="{{route('webinar',['type'=>'videos'])}}"><i class="la la-minus"></i> <span>Videos</span> </a>
				</li>
				<li class="{{ request()->routeIs('webinar') || request()->routeIs('webinar')  ? 'active' : '' }}" >
					<a href="{{route('webinar',['type'=>'gallery'])}}"><i class="la la-minus"></i> <span>Gallery</span> </a>
				</li>
				<li class="{{ request()->routeIs('webinar') || request()->routeIs('webinar')  ? 'active' : '' }}" >
					<a href="{{route('webinar',['type'=>'reports'])}}"><i class="la la-minus"></i> <span>Reports</span> </a>
				</li>
				<li class="{{ request()->routeIs('webinar') || request()->routeIs('webinar')  ? 'active' : '' }}" >
					<a href="{{route('webinar',['type'=>'webinars'])}}"><i class="la la-minus"></i> <span>Webinars</span> </a>
				</li>
			</ul>
		</li>
		<li class="{{ request()->routeIs('our.clients') ? 'active' : '' }}">
			<a href="{{route('our.clients')}}">
				<i class="la la-user-plus"></i> <span>Our Clients </span>
			</a>
		</li>
		
		{{-- <li class="{{ request()->routeIs('project.create') ? 'active' : '' }}">
			<a href="{{route('project.create')}}">
				<i class="la la-comment"></i> <span>Our Projects </span>
			</a>
		</li> --}}
		<li class="{{ request()->routeIs('our.teams') || request()->routeIs('our.teams.create') ? 'active' : '' }}">
			<a href="{{route('our.teams')}}">
				<i class="la la-user-plus"></i> <span>Our Team </span>
			</a>
		</li>
		<li class="{{ request()->routeIs('project.index') ? 'active' : '' }}">
			<a href="{{route('project.index')}}">
				<i class="la lacomment"></i> <span>Our Projects </span>
			</a>
		</li>
		<li class="{{ request()->routeIs('settings') ? 'active' : '' }}">
			<a href="#">
				<i class="zmdi zmdi-settings-square"></i> <span>Settings </span> <i class="la la-angle-right down-arrow"></i>
			</a>
			<ul class="sidebar-submenu">
				<li class="{{ request()->routeIs('settings')  ? 'active' : '' }}" ><a href="{{route('settings')}}"><i class="la la-minus"></i> <span> Setting</span> </a></li>
			</ul>
		</li>
	
	</ul>
</div>