document.addEventListener("DOMContentLoaded", function () {
  const footerHTML = `  
    <div><img src="assets/img/icon2.svg" alt=""></div>
    <div class="footer-content">

    <div class="footer-title">
      <h2 class="">Desenvolvimento</h2>
      <h2 class="">Navegação</h2>
      <h2 class="">Contato</h2>
    </div>
      
      <div class="footer-links">
        <ul>
          <li><a href="#">Maria Lígia Nascimento</a></li>
          <li><a href="#">Geraldo Duarte</a></li>
          <li><a href="#">Davi Freitas</a></li>
          <li><a href="#">Paulo Flávio</a></li>
          <li><a href="#">Márcio Gabriel</a></li>
        </ul>
        
        <ul>
          <li><a href="#">Iníco</a></li>
          <li><a href="#">Professor</a></li>
          <li><a href="#">Questões</a></li>
        </ul>
        
        <ul>
          <li><a href="#">Email</a></li>
          <li><a href="#">Telefone</a></li>
          <li><a href="#">Telefone</a></li>
        </ul>
      </div>

    </div>`;

  document.querySelector(".footer").innerHTML = footerHTML;
});