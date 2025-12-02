<div id="navbar" class="flex w-full fixed px-20 py-5 items-center z-50 text-white justify-around text-xl font-semibold transition-all duration-300">
    <h1 class="text-3xl font-bold text-pink-700">LINGIAN HOTEL</h1>
    <a class="hover:text-pink-700 transition-all duration-300 component" href="/">Home</a>
    <a class="hover:text-pink-700 transition-all duration-300 component" href="">About Us</a>
    <a class="hover:text-pink-700 transition-all duration-300 component" href="">Contact</a>
    <a class="hover:text-pink-700 transition-all duration-300 component" href="">Services</a>
    <div class="flex items-center gap-5">
        <a class="border-2 border-pink-700 rounded-md px-2 py-1 text-pink-700 hover:bg-pink-700 hover:text-white transition-all duration-300" href="">Register</a>
        <a class="bg-pink-700 border-2 border-pink-700 rounded-md px-2 py-1 hover:bg-pink-800 transition-all duration-300" href="">Sign In</a>
    </div>
</div>
<script>
    const navbar = document.getElementById('navbar');
    const components = document.querySelectorAll('.component')

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
            navbar.classList.add('bg-white', 'shadow-md');
            components.forEach(component => {
                component.classList.add('text-black')
            });
        } else {
            navbar.classList.remove('bg-white', 'shadow-md');
            components.forEach(component => {
                component.classList.remove('text-black')
            });
        }
    });
</script>