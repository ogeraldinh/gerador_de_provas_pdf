document.addEventListener("DOMContentLoaded", function() {
    const footerHTML = `  
    <div><img src="assets/img/icon2.svg" alt=""></div>
    <div class="footer-content">
        <div>
        <h2>Desenvolvimento</h2>
        <h3>Desenvolvedores:</h3>
        <ul>
            <li><a href="#">Geraldo Duarte</a></li>
            <li><a href="#">Lígia Nascimento</a></li>
            <li><a href="#">Paulo Flávio</a></li>
            <li><a href="#">Márcio Gabriel</a></a></li>
        </ul>
        </div>
        <div>
        <h2>Navegação</h2>
        <ul>
            <li><a href="#">Início</a></li>
            <li><a href="#">Professores</a></li>
            <li><a href="#">Questões</a></li>
        </ul>
        </div>
        <div>
        <h2>Contatos</h2>
        <ul>
            <li>teste@gmail.com</li>
            <li>teste2@gmail.com</li>
            <li>+55 (85) 9 9999-9999</li>
        </ul>
        </div>
    </div>`;

  document.querySelector(".footer").innerHTML = footerHTML
});