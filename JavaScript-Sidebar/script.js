function toggleSidebar() {
	const sidebar = document.getElementById("sidebar");
	const toggleBtn = document.getElementById("toggleBtn");
	const headBtn = document.getElementById("headBtn");

	sidebar.classList.toggle("active");
	toggleBtn.classList.toggle("active");
	headBtn.classList.toggle("active");
}