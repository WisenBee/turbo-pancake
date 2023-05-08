function LoggedIn(user_id, type, username) {
  // Get the button element
  var logoutButton = document.querySelector("#log");
  var userText = document.querySelector("#userWelcome");
  
  
  userText.innerHTML = username;

  // Remove any previous onclick function and change the inner text of the button
  logoutButton.onclick = null;
  logoutButton.innerHTML = "Logout";

  // Add a new click event listener to the button
  logoutButton.addEventListener("click", function () {
    // Send request to server to run logout script
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../additional/logout.php", true);
    xhr.send();

    // Reload the page to update changes
    location.reload();
  });

  // Remove the log and sign elements
  document.getElementById('sign').remove();

  loadProducts(user_id, type);

}

function notLoggedIn() {
  var addProduct = document.querySelector("#add");
  addProduct.style.display = "none";
  loadProducts(0, "guest");
}

function loadProducts(user_id, type) {
  console.log(user_id)
  console.log(type)
  console.log(type == "admin")
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var products = JSON.parse(this.responseText);
      var html = "";
      for (var i = 0; i < products.length; i++) {
        var product = products[i];
        var editButton = "";
        var deleteButton = "";
        if (type == "admin") {
          if (product["owner"] == user_id) {
            editButton = "<a href='/html/edit.php?id=" + product["num"] + "' class='edit-button'><i class='fa-solid fa-edit'></i></a>";
            deleteButton = "<a href='/html/delete.php?id=" + product["num"] + "' class='delete-button'><i class='fa-solid fa-trash'></i></a>";
          } else {
            deleteButton = "<a href='/html/delete.php?id=" + product["num"] + "' class='delete-button'><i class='fa-solid fa-trash'></i></a>";
          }
        } else {
          if (product["owner"] == user_id) {
            editButton = "<a href='/html/edit.php?id=" + product["num"] + "' class='edit-button'><i class='fa-solid fa-edit'></i></a>";
            deleteButton = "<a href='/html/delete.php?id=" + product["num"] + "' class='delete-button'><i class='fa-solid fa-trash'></i></a>";
          } else {

          }
        }
        html += "<div class='product'>" +
          "<div class='product-actions'>" +
          editButton +
          deleteButton +
          "</div>" +
          "<div class='image' onclick=\"window.location.href='/html/detail.php?id=" + product["num"] + "'\">" +
          "<img src='images/" + product["url"] + "' alt=''>" +
          "</div>" +
          "<div class='namePrice'>" +
          "<h3>" + product["nom"] + "</h3>" +
          "<span>" + product["prix"] + " DA </span>" +
          "</div>" +
          "<p>" + product["description_simple"] + "</p>";
        var stars = "";
        for (var j = 1; j <= 5; j++) {
          if (j <= product["rating"]) {
            stars += "<i class='fa-solid fa-star'></i>";
          } else {
            stars += "<i class='fa-regular fa-star'></i>";
          }
        }
        html += "<div class='stars'>" + stars + "</div>" +
          "<div class='buy'>" +
          "<button onclick=\" openPayMode(); \" > buy now </button>" +
          "</div>" +
          "</div>";
      }
      document.querySelector(".products").innerHTML = html;
    }
  };
  xmlhttp.open("GET", "../additional/loadProducts.php", true);
  xmlhttp.send();
}

function search(searchText, user_id, type) {

  var searchBtn = document.getElementById("searchBtn");
  searchBtn.innerHTML = "<i class='fa-solid fa-times' onclick='cancelSearch()'></i>";

  searchBtn.addEventListener('click', function () {
    location.reload();
  });

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var products = JSON.parse(this.responseText);
      var html = "";
      for (var i = 0; i < products.length; i++) {
        var product = products[i];
        var editButton = "";
        var deleteButton = "";
        if (type == "admin") {
          if (product["owner"] == user_id) {
            editButton = "<a href='/html/edit.php?id=" + product["num"] + "' class='edit-button'><i class='fa-solid fa-edit'></i></a>";
            deleteButton = "<a href='/html/delete.php?id=" + product["num"] + "' class='delete-button'><i class='fa-solid fa-trash'></i></a>";
          } else {
            deleteButton = "<a href='/html/delete.php?id=" + product["num"] + "' class='delete-button'><i class='fa-solid fa-trash'></i></a>";
          }
        } else {
          if (product["owner"] == user_id) {
            editButton = "<a href='/html/edit.php?id=" + product["num"] + "' class='edit-button'><i class='fa-solid fa-edit'></i></a>";
            deleteButton = "<a href='/html/delete.php?id=" + product["num"] + "' class='delete-button'><i class='fa-solid fa-trash'></i></a>";
          } else {

          }
        }
        html += "<div class='product'>" +
          "<div class='product-actions'>" +
          editButton +
          deleteButton +
          "</div>" +
          "<div class='image' onclick=\"window.location.href='/html/detail.php?id=" + product["num"] + "'\">" +
          "<img src='images/" + product["url"] + "' alt=''>" +
          "</div>" +
          "<div class='namePrice'>" +
          "<h3>" + product["nom"] + "</h3>" +
          "<span>" + product["prix"] + " DA </span>" +
          "</div>" +
          "<p>" + product["description_simple"] + "</p>";
        var stars = "";
        for (var j = 1; j <= 5; j++) {
          if (j <= product["rating"]) {
            stars += "<i class='fa-solid fa-star'></i>";
          } else {
            stars += "<i class='fa-regular fa-star'></i>";
          }
        }
        html += "<div class='stars'>" + stars + "</div>" +
          "<div class='buy'>" +
          "<button onclick=\" openPayMode(); \" > buy now </button>" +
          "</div>" +
          "</div>";
      }
      document.querySelector(".products").innerHTML = html;
    }
  };
  xmlhttp.open("GET", "../additional/search.php?searchText=" + searchText, true);
  xmlhttp.send();

}