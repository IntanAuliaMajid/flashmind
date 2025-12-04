<script>
    function toggleDarkMode() {
        document.documentElement.classList.toggle("dark");
        localStorage.setItem("darkMode", document.documentElement.classList.contains("dark"));
    }

    if (localStorage.getItem("darkMode") === "true") {
        document.documentElement.classList.add("dark");
    }

    function toggleProfileMenu() {
        document.getElementById("profileMenu").classList.toggle("hidden");
    }

    document.addEventListener("click", function (e) {
        const menu = document.getElementById("profileMenu");
        const button = menu.previousElementSibling;

        if (!menu.contains(e.target) && !button.contains(e.target)) {
            menu.classList.add("hidden");
        }
    });
</script>
