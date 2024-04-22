function deletarUsuario(idUsuario) {
    if (confirm("Tem certeza que deseja excluir este usuário?")) {
      // Fazer uma solicitação AJAX para excluir o usuário
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "controler/excluir_usuario.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Se a exclusão for bem-sucedida, recarregue a página para atualizar a lista de usuários
          alert("Usuário excluído com sucesso!");
          location.reload();
        }
      };
      xhr.send("id=" + idUsuario);
    }
  }
  