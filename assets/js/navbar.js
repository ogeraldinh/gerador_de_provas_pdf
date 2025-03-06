document.addEventListener("DOMContentLoaded", function() {
    const navbarHTML = `  
    <nav class="navbar">
    <div id="logo">
      <img src="assets/img/logo.svg" alt="" />
    </div>
    <ul>
      <li><a href="#" id="selected">Início</a></li>
      <li><a href="#">Professor</a></li>
      <li><a href="#">Questões</a></li>
      <li><a href="#">Gerar Prova</a></li>
    </ul>
  </nav>`;

  document.querySelector(".navbar").innerHTML = navbarHTML
});