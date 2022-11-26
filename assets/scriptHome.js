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

// function openModalLogin(e) {
//   let domModalLogin = document.querySelector(".login-modal");
//   if (domModalLogin.classList.contains("close")) {
//     domModalLogin.style.display = "block";
//     domModalLogin.addEventListener("click", (e) => {
//       console.log();
//       if (e.target.classList[0] == "body-modal-login") {
//         domModalLogin.style.display = "none";
//       }
//     });
//   }
// }

// const buttonClickOpenBookId = document.querySelector(".book-list");
// buttonClickOpenBookId.addEventListener("click", (e) => {
//   const modal = document.querySelector(".livro-per-id-modal");
//   modal.style.display = "flex";
//   modal.addEventListener("click", (ev) => {
//     if (ev.target.classList[0] == "livro-per-id-modal") {
//       modal.style.display = "none";
//     }
//   });
// });

function openProfileData() {
  const domIconPerson = document.querySelector(".perfil-dados-modal");
  if (domIconPerson.classList.contains("perfil-dados-modal")) {
    domIconPerson.style.display = "flex";
    domIconPerson.addEventListener("click", (e) => {
      console.log(e.target.classList);
      if (e.target.classList[0] == "perfil-dados-modal") {
        domIconPerson.style.display = "none";
      }
    });
  }
}


