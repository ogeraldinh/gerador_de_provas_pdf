document.addEventListener("DOMContentLoaded", function() {
    const navbarHTML = `  
    <div id="logo">
      <img src="assets/img/logo.svg" alt="" />
    </div>
    <ul>
      <li><a href="index.html" class="inicio-select">Início</a></li>
      <li><a href="professor.html" class="professor-select">Professor</a></li>
      <li><a href="questoes.html" class="questoes-select">Questões</a></li>
      <li><a href="prova.html" class="prova-select">Gerar Prova</a></li>
    </ul>`;

  document.querySelector(".navbar").innerHTML = navbarHTML
});