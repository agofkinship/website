document.addEventListener("DOMContentLoaded", () => {
	console.log("DOM fully loaded and parsed");

	// select the main-nav only
	const mainNav = document.querySelector(".main-nav");
	if (mainNav) {
		const hamburger = mainNav.querySelector(".hamburger");
		const navLinks = mainNav.querySelector(".nav-links");

		hamburger.addEventListener("click", (e) => {
			navLinks.classList.toggle("active");
			e.stopPropagation();
		});

		// close menu when clicking outside
		document.addEventListener("click", (e) => {
			if (!navLinks.contains(e.target) && !hamburger.contains(e.target)) {
				navLinks.classList.remove("active");
			}
		});
	}

	// back to top button
	const backToTopButton = document.getElementById("back-to-top");
	window.addEventListener("scroll", () => {
		if (backToTopButton) {
			if (window.scrollY > 100) {
				backToTopButton.style.display = "block";
			} else {
				backToTopButton.style.display = "none";
			}
		}
	});

	if (backToTopButton) {
		backToTopButton.addEventListener("click", () => {
			window.scrollTo({
				top: 0,
				behavior: "smooth",
			});
		});
	}
});