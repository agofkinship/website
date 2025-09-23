// add dom content loaded event listener
document.addEventListener("DOMContentLoaded", () => {
	console.log("DOM fully loaded and parsed");

	// hamburger menu action

	const hamburger = document.querySelector(".hamburger");
	const navLinks = document.querySelector(".nav-links");

	hamburger.addEventListener("click", (e) => {
		navLinks.classList.toggle("active");
		e.stopPropagation(); // prevents menu from randomly closing
	});

	// close menu when clicking off menu
	document.addEventListener("click", (e) => {
		if (!navLinks.contains(e.target) && !hamburger.contains(e.target)) {
			navLinks.classList.remove("active");
		}
	});

	// back to top button

	window.addEventListener("scroll", () => {
		const backToTopButton = document.getElementById("back-to-top");
		if (window.scrollY > 100) {
			backToTopButton.style.display = "block";
		} else {
			backToTopButton.style.display = "none";
		}

		backToTopButton.addEventListener("click", () => {
			window.scrollTo({
				top: 0,
				behavior: "smooth",
			});
		});
	});
});
