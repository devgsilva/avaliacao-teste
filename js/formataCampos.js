$(document).ready(function () {
  var $campoCPF = $("#cpf_pessoa");
  $campoCPF.mask("000.000.000-00", {
    reverse: false,
  });
});

$(document).ready(function () {
  var $campoRG = $("#rg_pessoa");
  $campoRG.mask("00.000.000", {
    reverse: false,
  });
});

$(document).ready(function () {
  var $campoTelefone = $("#telefone_pessoa");
  $campoTelefone.mask("(00) 0000-0000", {
    reverse: false,
  });
});

$(document).ready(function () {
  var $campoCelular = $("#celular_pessoa");
  $campoCelular.mask("(00) 00000-0000", {
    reverse: false,
  });
});

$(document).ready(function () {
  var $campoDataNascimento = $("#data_nascimento");
  $campoDataNascimento.mask("00/00/0000", {
    reverse: false,
  });
});
