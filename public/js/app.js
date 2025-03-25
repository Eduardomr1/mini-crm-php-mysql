// Validaciones cliente con jQuery clasico
$(document).ready(function() {
    $('form').on('submit', function() {
        var email = $('input[type="email"]').val();
        if (email && email.indexOf('@') === -1) {
            alert('Por favor ingrese un correo electronico valido');
            return false;
        }
        return true;
    });
});
