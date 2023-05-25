document.addEventListener("DOMContentLoaded", function () {
    // Check if the sidebar is minimized in localStorage
    const isSidebarMinimized = localStorage.getItem("sidebarMinimized");

    // Function to toggle sidebar state
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const navbar = document.getElementById("navbar");
        const content = document.getElementById("content");
        const sidebarToggleIcon = document.getElementById(
            "sidebar-toggle-icon"
        );

        sidebar.classList.toggle("minimized");
        navbar.classList.toggle("minimized");
        content.classList.toggle("minimized");

        // Update the arrow icon based on the sidebar state
        const isMinimized = sidebar.classList.contains("minimized");
        const sidebarToggleIconElement = document.getElementById(
            "sidebar-toggle-icon"
        );
        sidebarToggleIconElement.setAttribute(
            "data-feather",
            isMinimized ? "arrow-right" : "arrow-left"
        );
        feather.replace();

        // Save the sidebar state in localStorage
        localStorage.setItem("sidebarMinimized", isMinimized);
    }

    // Check if the sidebar was previously minimized
    if (isSidebarMinimized === "true") {
        const sidebar = document.getElementById("sidebar");
        const navbar = document.getElementById("navbar");
        const content = document.getElementById("content");
        const sidebarToggleIcon = document.getElementById(
            "sidebar-toggle-icon"
        );

        sidebar.classList.add("minimized");
        navbar.classList.add("minimized");
        content.classList.add("minimized");
        sidebarToggleIcon.classList.add("hidden");

        // Add a delay to prevent the initial animation glitch
        setTimeout(function () {
            sidebarToggleIcon.classList.remove("hidden");
        }, 300);
    }

    // Toggle sidebar on button click
    document
        .getElementById("sidebar-toggle-button")
        .addEventListener("click", function () {
            toggleSidebar();
        });

    // Toggle sidebar on clicking anywhere inside the minimized sidebar
    document
        .getElementById("sidebar-minimized")
        .addEventListener("click", function () {
            toggleSidebar();
        });

    // Toggle sidebar on clicking any links inside the minimized sidebar
    const sidebarLinks = document.querySelectorAll("#sidebar-minimized a");
    sidebarLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            toggleSidebar();
        });
    });
});
