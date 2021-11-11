const title = "Complaint Management System";
const items = [
  {
    title: "Administrator",
    img: "admin.png",
    body: "This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer",
    link: "http://localhost/cms/admin/",
  },
  {
    title: "Faculty",
    img: "faculty.png",
    body: "This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer",
    link: "http://localhost/cms/user/",
  },
  {
    title: "Student",
    img: "student.png",
    body: "This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer",
    link: "http://localhost/cms/user/",
  },
];

// Navigation Bar Title
document.getElementById("navbar-title").innerText = title;

// Navigation Bar Items
document.getElementById("navbar-items").innerHTML = [{
  title: 'Home',
  link: 'http://localhost/cms/',
}].concat(items).map((v) => {
  return `<a class="home-nav nav-link active" data-type="${v.title}" href="${v.link}">${v.title}</a>`;
}).join("");

// Home Page Cards
document.getElementById("card-items").innerHTML = items.map((v) => {
  return `<div class="col">
    <div class="card h-100" style="max-width: 18rem;">
      <img class="card-img-top" src="assets/img/${v.img}" alt="${v.title}" />
      <div class="card-body">
        <h5 class="card-title">${v.title}</h5>
        <p class="card-text">${v.body}</p>
        <a class="home-nav stretched-link" data-type="${v.title}" href="${v.link}"> </a>
      </div>
    </div>
    </div>`;
}).join("");
