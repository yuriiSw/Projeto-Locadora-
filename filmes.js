function pesquisar() {
  var termo = document.getElementById("termo-pesquisa").value.toLowerCase();
  var imagens = document.querySelectorAll("#lista_filmes img");

  imagens.forEach(function(imagem) {
    var alt = imagem.getAttribute("alt").toLowerCase();
    var listItem = imagem.parentNode.parentNode; // Obtendo o elemento pai do elemento pai (o item da lista de filmes)

    if (alt.includes(termo) || termo === "") {
      listItem.style.display = "block"; // Exibe o item da lista de filmes se corresponder ao termo de pesquisa ou se o termo estiver vazio
    } else {
      listItem.style.display = "none"; // Oculta o item da lista de filmes se não corresponder ao termo de pesquisa
    }
  });

  return false; // Retorna false para evitar que o formulário recarregue a página
}
