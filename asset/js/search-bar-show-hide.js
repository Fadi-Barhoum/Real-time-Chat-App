const searchBar = document.querySelector(".search input");
const searchBtn = document.querySelector(".search button");

searchBtn.addEventListener("click", ()=> {
    searchBar.classList.toggle("show");
    searchBar.focus();
    searchBtn.classList.toggle("active");
})