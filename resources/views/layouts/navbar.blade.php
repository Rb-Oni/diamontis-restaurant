<div class="container-fluid relative bg-black text-white">
    <div x-data="{ open: true }" class="flex flex-col pr-4 lg:items-end lg:justify-between lg:flex-row lg:pr-12">
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden mx-5 lg:pb-2 lg:flex lg:justify-start lg:flex-row">
            <a class="" href="{{ route('welcome') }}">ACCUEIL</a>
            <a class="" href="{{ route('contact') }}">CONTACT</a>
        </nav>
    </div>
</div>