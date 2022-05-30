//abrir combo ciudad divipol
$(function () { 
    $('#province').change(function () { 
        let id = $(this).val();
        $('#city').load('./select_city.php?id='+id, function () { 
            $('#select_city.php').html({ show: true });
        });
    }); 
});

$(function () {
  $(".btnon_modal_usuario").click(function () {
    var id = $(this).data("id");
    $(".modal-body").load("./modal_usuario.php?id=" + id, function () {
      $("#Modal_usuario").modal({ show: true });
    });
  });
});
// state auth on
  let Alert = (action, texto) => {
    $(function () {
      $("." + action + "").click(function () {
        let id = $(this).data("id");
        let state = $(this).data("value");
        let title = texto;
        state_auth(id, title, state);
      });
    });
};



