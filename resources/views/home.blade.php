<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Smart Farming</title>
</head>

<body>

    <!-- navbar -->
    <div class="max-lg:collapse bg-base-200 shadow-sm w-full rounded-md">
        <input id="navbar-1-toggle" class="peer hidden" type="checkbox" />
        <label for="navbar-1-toggle" class="fixed inset-0 hidden max-lg:peer-checked:block"></label>
        <div class="collapse-title navbar">
            <div class="navbar-start">
                <label for="navbar-1-toggle" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <button class="btn btn-ghost text-xl text-center">SmartFarming</button>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li><button>Item 1</button></li>
                    <li>
                        <details>
                            <summary>Parent</summary>
                            <ul class="p-2 bg-base-100 w-40 z-1">
                                <li>
                                    <button`>Submenu 1</button>
                                </li>
                                <li><button>Submenu 2</button></li>
                            </ul>
                        </details>
                    </li>
                    <li><button>Item 3</button></li>
                </ul>
            </div>
            <div class="navbar-end">
                <input type="text" placeholder="Search" class="input input-bordered w-64 lg:w-auto hidden md:block" />
            </div>
        </div>

        <!-- Mobile -->
        <div class="collapse-content lg:hidden z-1">
            <ul class="menu">
                <li><button>Item 1 mobile</button></li>
                <li>
                    <details>
                        <summary>Parent</summary>
                        <ul>
                            <li><button>Submenu 1</button></li>
                            <li><button>Submenu 2</button></li>
                        </ul>
                    </details>
                </li>
                <li><button>Item 3</button></li>
            </ul>
        </div>
    </div>
    <!-- navbar end -->

    <!-- content -->
    <div class="flex flex-col px-2 py-2">
        <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam accusantium nobis dolorum, ab suscipit facere vero reiciendis, sint velit minima cumque harum alias porro amet consectetur possimus eveniet pariatur tempora.
        </div>
        <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. In rem fugit dolor dolorem similique tempora blanditiis atque minima repellat voluptatibus fugiat soluta nemo, unde facere, tempore, asperiores repudiandae iure voluptates?
        </div>
    </div>

</body>

</html>