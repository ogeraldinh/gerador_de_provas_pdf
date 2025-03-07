document.addEventListener("DOMContentLoaded", function() {
    const navbarHTML = `  
    <nav class="navbar">
    <div id="logo">
      <img src="assets/img/logo.svg" alt="" />
    </div>
    <ul>
      <li><a href="index.html" id="selected">Início</a></li>
      <li><a href="professor.html">Professor</a></li>
      <li><a href="questoes.html">Questões</a></li>
      <li><a href="prova.html">Gerar Prova</a></li>
    </ul>
  </nav>`;

  document.querySelector(".navbar").innerHTML = navbarHTML
});