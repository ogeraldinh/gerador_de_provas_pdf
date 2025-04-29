document.addEventListener("DOMContentLoaded", function () {
  const footerHTML = `  
    <div><img src="assets/img/icon2.svg" alt=""></div>
    <div class="footer-content">
    <table>
      <thead>
          <tr>
              <th class="footer-title">Desenvolvimento</th>
              <th class="footer-title">Navegação</th>
              <th class="footer-title">Contatos</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td><a href="#">Maria Lígia Nascimento</a></td>
              <td><a href="#">Iníco</a></td>
              <td>contato@gmail.com</td>
          </tr>
          <tr>
              <td><a href="#">Geraldo Duarte</a></td>
              <td><a href="#">Professor</a></td>
              <td>+55 (85) 9 99999-9999</td>
          </tr>
          <tr>
              <td><a href="#">Davi Freitas</a></td>
              <td><a href="#">Questões</a></td>
              <td>+55 (85) 9 99999-9999</td>
          </tr>
          <tr>
              <td><a href="#">Márcio Gabriel</a></td>
          </tr>
      </tbody>
    </table>
</div>
    </div>`;

  document.querySelector(".footer").innerHTML = footerHTML;
});