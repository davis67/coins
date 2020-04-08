<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
    <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
        <li class="mr-6 my-2 md:my-0">
            <a href="{{route('home') }}" class="block {{ Nav::isRoute('home') }} py-1 md:py-3 pl-1 text-gray-500 align-middle no-underline hover:text-gray-800 border-b-2 border-white hover:border-red-800">
                <i class="fas fa-home fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Home</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-800 border-b-2 border-white hover:border-red-800">
                <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Opportunities</span>
            </a>
        </li>
         <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Documents</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
        <a href="{{route('users.index')}}" class="{{ Nav::isResource('users') }} block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                <i class="fa fa-user-plus fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Users</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
        <a href="{{route('teams.index')}}" class="{{ Nav::isResource('teams') }} block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                <i class="fas fa-users fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Teams</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                <i class="fas fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Contacts</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Associates</span>
            </a>
        </li>
        <li class="mr-6 my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
                <i class="fa fa-wallet fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Configurations</span>
            </a>
        </li>
    </ul>

    <div class="relative pull-right pl-4 pr-4 md:pr-0">
        <input type="search" placeholder="Search" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
        <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
            <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
            </svg>
        </div>
    </div>

</div>
