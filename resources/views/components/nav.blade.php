<nav class="flex items-center justify-between shadow flex-wrap p-4 bg-panel mb-8">
  <div class="flex items-center flex-no-shrink">
    <a class="no-underline" href="/">
      @include('components.logo')
    </a>
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-primary border-primary hover:text-primary hover:border-primary">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div class="w-full block lg:flex lg:items-center lg:w-auto items-end">
    <div class="text-sm lg:flex-grow text-base">
      <a href="/tag/articles" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
        Articles
      </a>

      <a href="/tag/assets" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
        Twitch Assets
      </a>

      <a href="/streamers" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
        Streams
      </a>

      <a href="/tag/guides" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
        Guides
      </a>

      @auth
        <a href="/articles/create" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
          Create Article
        </a>

        <a href="/asset/create" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
          Create Twitch Asset
        </a>

        <a href="/tags/create" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
          Create New Tag
        </a>

        <a href="/streamers/create" class="block mt-4 lg:inline-block lg:mt-0 text-nav-link font-title hover:text-primary mr-4 no-underline">
          Add New Streamer
        </a>
      @endauth
    </div>
  </div>
</nav>