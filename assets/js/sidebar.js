// Mobile sidebar toggle
const menuToggle = document.getElementById("menuToggle");
const closeSidebar = document.getElementById("closeSidebar");
const sidebar = document.getElementById("sidebar");
const sidebarOverlay = document.getElementById("sidebarOverlay");

function openSidebar() {
  sidebar.classList.add("open");
  sidebarOverlay.classList.add("active");
  document.body.style.overflow = "hidden";
}

function closeSidebarFunc() {
  sidebar.classList.remove("open");
  sidebarOverlay.classList.remove("active");
  document.body.style.overflow = "";
}

menuToggle.addEventListener("click", openSidebar);
closeSidebar.addEventListener("click", closeSidebarFunc);
sidebarOverlay.addEventListener("click", closeSidebarFunc);

// Close sidebar on window resize if desktop
window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    closeSidebarFunc();
  }
});
