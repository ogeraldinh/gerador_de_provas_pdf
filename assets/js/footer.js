document.addEventListener("DOMContentLoaded", function() {
    const footerHTML = `  
    <div><img src="assets/img/icon2.svg" alt=""></div>

    <div class="footer-title">
      <h2>Desenvolvedores</h2>
      <h2>Navegação</h2>
      <h2>Contatos</h2>
    </div>
      
      <div class="footer-links">
        <ul>
          <li><a href="#">Geraldo Duarte</a></li>
          <li><a href="#">Lígia Nascimento</a></li>
          <li><a href="#">Davi Freitas</a></li>
          <li><a href="#">Paulo Flávio</a></li>
          <li><a href="#">Márcio Gabriel</a></li>
        </ul>
        
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#">Professor</a></li>
          <li><a href="#">Questões</a></li>
        </ul>
        
        <ul>
          <li>teste@gmail.com</li>
          <li>+55 (85) 9 9999-9999</li>
        </ul>

    </div>`;

  document.querySelector(".footer").innerHTML = footerHTML
});