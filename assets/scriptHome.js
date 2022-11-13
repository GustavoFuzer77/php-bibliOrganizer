function includeHTML() {
  var z, i, elmnt, file, xhttp;

  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
          if (this.status == 200) {
            elmnt.innerHTML = this.responseText;
          }

          if (this.status == 404) {
            elmnt.innerHTML = "Page not found.";
          }

          elmnt.removeAttribute("w3-include-html");

          includeHTML();
        }
      };
      xhttp.open("GET", file, true);

      xhttp.send();
      return;
    }
  }
}

let domE = document.querySelector("#nav-bar-menu");

function openModalLogin(e) {
  let domModalLogin = document.querySelector(".login-modal");
  if (domModalLogin.classList.contains("close")) {
    domModalLogin.style.display = "block";
    domModalLogin.addEventListener("click", (e) => {
      console.log();
      if (e.target.classList[0] == "body-modal-login") {
        domModalLogin.style.display = "none";
      }
    });
  }
}

function openModalLivroInfo() {
  const domModalLivroInfo = document.querySelector(".livro-per-id-modal");
  if (domModalLivroInfo.classList.contains("livro-per-id-modal")) {
    domModalLivroInfo.style.display = "flex";
    domModalLivroInfo.addEventListener("click", (e) => {
      console.log(e.target.classList);
      if (e.target.classList[0] == "livro-per-id-modal") {
        domModalLivroInfo.style.display = "none";
      }
    });
  }
}

domE.addEventListener(
  "click",
  (e) => {
    if (domE.classList.contains("opened-class-style")) {
      domE.classList.remove("opened-class-style");
      domE.classList.add("closing-class-style");
    } else {
      domE.classList.add("opened-class-style");
    }
  },
  false
);
