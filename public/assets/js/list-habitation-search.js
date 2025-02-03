document.getElementById("search-input").addEventListener("input", function () {
  const searchValue = this.value.toLowerCase();
  const budgets = document.querySelectorAll(".each-budget");

  budgets.forEach((budget) => {
    const firstSpanText =
      budget.querySelector("p span")?.innerText.toLowerCase() || "";

    if (firstSpanText.includes(searchValue)) {
      budget.style.display = "";
    } else {
      budget.style.display = "none";
    }
  });
});
