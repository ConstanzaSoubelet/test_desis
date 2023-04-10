function validar() {
  var nombre, alias, email;
  var numeros="0123456789";
  nombre = document.getElementById("nombre").value;
  alias = document.getElementById("alias").value;
  email = document.getElementById("email").value;
  expresion = /\w+@\w+\.+[a-z]/; 
  if (nombre ===""){
    alert("El campo Nombre y Apellido esta vacío");
    return false;
  } else if (alias.length < 5) {
    alert("El alias debe contener mas de 5 caracteres, letras y números.");
    return false;
  }else if (alias == numeros ){
    alert("");
    return false;
  }else if (!expresion.test(email)) {
    alert("Ingresa Email");
    return false;
  } 
}

