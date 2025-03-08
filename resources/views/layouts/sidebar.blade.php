  <!-- dark overlay for when the sidebar is open on smaller screens  -->
  <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-slate-950/10 backdrop-blur-xs md:hidden"
      x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

  <nav x-cloak
      class="fixed left-0 z-30 flex h-svh w-60 shrink-0 flex-col border-r border-slate-300 bg-slate-50 p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative"
      x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">

      {{-- logo --}}
      <a href="{{ route('home') }}" class="flex items-center gap-3 text-orange-500 font-bold text-2xl">
          <img src="{{ asset('images/basket.svg') }}" alt="application logo" class="size-6 object-cover object-center">
          <span>Shopsmart</span>
      </a>

      <!-- search  -->
      <div class="my-5">
          <x-forms.search-input placeholde="Search" />
      </div>

      <!-- sidebar links  -->
      <div class="flex flex-col gap-2 overflow-y-auto pb-6">

          <a href="{{ route('dashboard') }}" @class([
              'flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 ',
              'bg-black/10 text-slate-900' => request()->routeIs('dashboard'),
          ])>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                  aria-hidden="true">
                  <path
                      d="M15.5 2A1.5 1.5 0 0 0 14 3.5v13a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-13A1.5 1.5 0 0 0 16.5 2h-1ZM9.5 6A1.5 1.5 0 0 0 8 7.5v9A1.5 1.5 0 0 0 9.5 18h1a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 10.5 6h-1ZM3.5 10A1.5 1.5 0 0 0 2 11.5v5A1.5 1.5 0 0 0 3.5 18h1A1.5 1.5 0 0 0 6 16.5v-5A1.5 1.5 0 0 0 4.5 10h-1Z" />
              </svg>
              <span>Dashboard</span>
          </a>

          {{-- customer management --}}
          <a href="{{ route('customers.index') }}" @class([
              'flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 ',
              'bg-black/10 text-slate-900' => request()->routeIs('customers.*'),
          ])>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 shrink-0"
                  aria-hidden="true">
                  <path
                      d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z" />
              </svg>
              <span>Customers</span>
          </a>


          <!-- collapsible item  -->
          <div x-data="{ isExpanded: false }" class="flex flex-col">
              <button type="button" x-on:click="isExpanded = ! isExpanded" id="products-btn" aria-controls="products"
                  x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
                  class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline"
                  x-bind:class="isExpanded ?
                      'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' :
                      'text-on-surface hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong dark:hover:bg-primary-dark/5'">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                      class="size-5 shrink-0" aria-hidden="true">
                      <path
                          d="M10.362 1.093a.75.75 0 0 0-.724 0L2.523 5.018 10 9.143l7.477-4.125-7.115-3.925ZM18 6.443l-7.25 4v8.25l6.862-3.786A.75.75 0 0 0 18 14.25V6.443ZM9.25 18.693v-8.25l-7.25-4v7.807a.75.75 0 0 0 .388.657l6.862 3.786Z" />
                  </svg>
                  <span class="mr-auto text-left">Products</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                      class="size-5 transition-transform rotate-0 shrink-0"
                      x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                      <path fill-rule="evenodd"
                          d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                          clip-rule="evenodd" />
                  </svg>
              </button>

              <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="products-btn" id="products">
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('products.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('products.*'),
                      ])>All
                          Products</a>
                  </li>
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('categories.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('categories.*'),
                      ])>Categories</a>
                  </li>

                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="#"
                          class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline dark:text-on-surface-dark dark:hover:bg-primary-dark/5 dark:hover:text-on-surface-dark-strong">Tags</a>
                  </li>
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('attributes.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('attributes.*'),
                      ])>Attributes</a>
                  </li>
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('reviews.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('reviews.*'),
                      ])>Reviews</a>
                  </li>
              </ul>
          </div>


          <!-- collapsible item  -->
          <div x-data="{ isExpanded: false }" class="flex flex-col">
              <button type="button" x-on:click="isExpanded = ! isExpanded" id="products-btn" aria-controls="products"
                  x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
                  class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline"
                  x-bind:class="isExpanded ?
                      'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' :
                      'text-on-surface hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong dark:hover:bg-primary-dark/5'">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                      class="size-5 shrink-0" aria-hidden="true">
                      <path
                          d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z" />
                      <path
                          d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                  </svg>
                  <span class="mr-auto text-left">Orders</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                      class="size-5 transition-transform rotate-0 shrink-0"
                      x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                      <path fill-rule="evenodd"
                          d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                          clip-rule="evenodd" />
                  </svg>
              </button>

              <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="products-btn" id="products">
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('orders.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('orders.*'),
                      ])>All
                          Orders</a>
                  </li>
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('transactions.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('transactions.*'),
                      ])>Transactions</a>
                  </li>
              </ul>
          </div>

          <!-- collapsible item  -->
          <div x-data="{ isExpanded: false }" class="flex flex-col">
              <button type="button" x-on:click="isExpanded = ! isExpanded" id="user-management-btn"
                  aria-controls="user-management" x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
                  class="flex items-center justify-between rounded-radius gap-2 px-2 py-1.5 text-sm font-medium underline-offset-2 focus:outline-hidden focus-visible:underline"
                  x-bind:class="isExpanded ?
                      'text-on-surface-strong bg-primary/10 dark:text-on-surface-dark-strong dark:bg-primary-dark/10' :
                      'text-on-surface hover:bg-primary/5 hover:text-on-surface-strong dark:text-on-surface-dark dark:hover:text-on-surface-dark-strong dark:hover:bg-primary-dark/5'">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-[18px] shrink-0"
                      fill="currentColor" aria-hidden="true">
                      <path
                          d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                  </svg>
                  <span class="mr-auto text-left">Roles and permissions</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                      class="size-5 transition-transform rotate-0 shrink-0"
                      x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                      <path fill-rule="evenodd"
                          d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                          clip-rule="evenodd" />
                  </svg>
              </button>

              <ul x-cloak x-collapse x-show="isExpanded" aria-labelledby="user-management-btn" id="user-management">
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('roles.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('roles.*'),
                      ])>Roles</a>
                  </li>
                  <li class="px-1 py-0.5 first:mt-2">
                      <a href="{{ route('permissions.index') }}" @class([
                          'flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus:outline-hidden focus-visible:underline',
                          'bg-black/10 text-slate-900' => request()->routeIs('permissions.*'),
                      ])>Permissions</a>
                  </li>
              </ul>
          </div>



          <a href="#"
              class="flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="size-5 shrink-0" aria-hidden="true">
                  <path fill-rule="evenodd"
                      d="M4.606 12.97a.75.75 0 0 1-.134 1.051 2.494 2.494 0 0 0-.93 2.437 2.494 2.494 0 0 0 2.437-.93.75.75 0 1 1 1.186.918 3.995 3.995 0 0 1-4.482 1.332.75.75 0 0 1-.461-.461 3.994 3.994 0 0 1 1.332-4.482.75.75 0 0 1 1.052.134Z"
                      clip-rule="evenodd" />
                  <path fill-rule="evenodd"
                      d="M5.752 12A13.07 13.07 0 0 0 8 14.248v4.002c0 .414.336.75.75.75a5 5 0 0 0 4.797-6.414 12.984 12.984 0 0 0 5.45-10.848.75.75 0 0 0-.735-.735 12.984 12.984 0 0 0-10.849 5.45A5 5 0 0 0 1 11.25c.001.414.337.75.751.75h4.002ZM13 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"
                      clip-rule="evenodd" />
              </svg>
              <span>Sales</span>
          </a>

          <a href="#"
              class="flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="size-5 shrink-0" aria-hidden="true">
                  <path fill-rule="evenodd"
                      d="M1 2.75A.75.75 0 0 1 1.75 2h16.5a.75.75 0 0 1 0 1.5H18v8.75A2.75 2.75 0 0 1 15.25 15h-1.072l.798 3.06a.75.75 0 0 1-1.452.38L13.41 18H6.59l-.114.44a.75.75 0 0 1-1.452-.38L5.823 15H4.75A2.75 2.75 0 0 1 2 12.25V3.5h-.25A.75.75 0 0 1 1 2.75ZM7.373 15l-.391 1.5h6.037l-.392-1.5H7.373Zm7.49-8.931a.75.75 0 0 1-.175 1.046 19.326 19.326 0 0 0-3.398 3.098.75.75 0 0 1-1.097.04L8.5 8.561l-2.22 2.22A.75.75 0 1 1 5.22 9.72l2.75-2.75a.75.75 0 0 1 1.06 0l1.664 1.663a20.786 20.786 0 0 1 3.122-2.74.75.75 0 0 1 1.046.176Z"
                      clip-rule="evenodd" />
              </svg>
              <span>Performance</span>
          </a>

          <a href="#"
              class="flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="size-5 shrink-0" aria-hidden="true">
                  <path
                      d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
              </svg>
              <span>Referrals</span>
          </a>

          <a href="#"
              class="flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="size-5 shrink-0" aria-hidden="true">
                  <path fill-rule="evenodd"
                      d="M1 6a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V6Zm4 1.5a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2 3a4 4 0 0 0-3.665 2.395.75.75 0 0 0 .416 1A8.98 8.98 0 0 0 7 14.5a8.98 8.98 0 0 0 3.249-.604.75.75 0 0 0 .416-1.001A4.001 4.001 0 0 0 7 10.5Zm5-3.75a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75Zm0 6.5a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5h-2.5a.75.75 0 0 1-.75-.75Zm.75-4a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5h-2.5Z"
                      clip-rule="evenodd" />
              </svg>
              <span>Licenses</span>
          </a>

          <a href="#"
              class="flex items-center rounded-sm gap-2 px-2 py-1.5 text-sm font-medium text-slate-600 underline-offset-2 hover:bg-black/5 hover:text-slate-900 focus-visible:underline focus:outline-hidden dark:text-slate-300 dark:hover:bg-white/5 dark:hover:text-white">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                  class="size-5 shrink-0" aria-hidden="true">
                  <path fill-rule="evenodd"
                      d="M7.84 1.804A1 1 0 0 1 8.82 1h2.36a1 1 0 0 1 .98.804l.331 1.652a6.993 6.993 0 0 1 1.929 1.115l1.598-.54a1 1 0 0 1 1.186.447l1.18 2.044a1 1 0 0 1-.205 1.251l-1.267 1.113a7.047 7.047 0 0 1 0 2.228l1.267 1.113a1 1 0 0 1 .206 1.25l-1.18 2.045a1 1 0 0 1-1.187.447l-1.598-.54a6.993 6.993 0 0 1-1.929 1.115l-.33 1.652a1 1 0 0 1-.98.804H8.82a1 1 0 0 1-.98-.804l-.331-1.652a6.993 6.993 0 0 1-1.929-1.115l-1.598.54a1 1 0 0 1-1.186-.447l-1.18-2.044a1 1 0 0 1 .205-1.251l1.267-1.114a7.05 7.05 0 0 1 0-2.227L1.821 7.773a1 1 0 0 1-.206-1.25l1.18-2.045a1 1 0 0 1 1.187-.447l1.598.54A6.992 6.992 0 0 1 7.51 3.456l.33-1.652ZM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                      clip-rule="evenodd" />
              </svg>
              <span>Settings</span>
          </a>
      </div>
  </nav>
