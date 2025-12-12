// Make sure jQuery is loaded
$(document).ready(function () {
  // Highlight current page link
  const path = window.location.pathname;
  const page = path.split("/").pop(); // e.g. "resume.html"

  $("nav a").each(function () {
    const href = $(this).attr("href");
    if (href === page || (page === "" && href === "index.html")) {
      $(this).addClass("active");
    }
  });

  // Dark mode toggle
  $("#themeToggle").on("click", function () {
    $("body").toggleClass("dark-mode");
  });
});
