// Arquivo: filmes.js

// Função para buscar os filmes do servidor
function getFilmes() {
    // Realiza uma requisição HTTP para obter os filmes
    fetch('get_filmes.php')
        .then(response => response.json()) // Converte a resposta para JSON
        .then(data => {
            // Manipula os dados retornados (lista de filmes)
            const filmes = data;

            // Constrói o HTML para exibir os filmes
            let html = '';
            filmes.forEach(filme => {
                html += `
                    <div class="filme">
                        <h3>${filme.nome_filme}</h3>
                        <p>Gênero: ${filme.genero_filme}</p>
                        <p>Classificação: ${filme.classi_filme}</p>
                        <p>Idioma: ${filme.idioma_filme}</p>
                        <p>Data de Lançamento: ${filme.data_lanc_filme}</p>
                        <p>Duração: ${filme.duracao_filme} minutos</p>
                        <p>Produtora: ${filme.produtura_filme}</p>
                        <!-- Adicione outras informações do filme conforme necessário -->
                        <img src="${filme.caminho_imagem}" alt="${filme.nome_filme}">
                    </div>
                `;
            });

            // Atualiza o conteúdo da div com id "lista_filmes" com o HTML gerado
            document.getElementById('lista_filmes').innerHTML = html;
        })
        .catch(error => {
            console.error('Erro ao buscar os filmes:', error);
        });
}

// Chama a função getFilmes quando a página é carregada
window.onload = getFilmes;
