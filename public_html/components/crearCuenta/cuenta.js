const formulario=document.getElementById("formulario");
var nombres=document.getElementById("nombres");
const rfcInformacion=document.getElementById("rfcInformacion");
let registrate=document.getElementById("registrate");
const inputs=document.querySelectorAll("#formulario");


const campos={
	nombres: false,
	apellidos: false,
	correoElectronico: false,
	rfc: false,
	captcha:false
}

//Funcion Validar formularios.

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombres":
			validarCampo(expresiones.nombres,e.target,"nombres");
		break;
		case "apellidos":
			validarCampo(expresiones.apellidos,e.target,"apellidos");
		break;
		case "correoElectronico":
			validarCampo(expresiones.correo,e.target,"correoElectronico");
		break;
		case "rfc":
			validarCampo(expresiones.rfc,e.target,"rfc");
		break;
	}
}

const quitarFormato = (expresion, input, campo) => {
	document.getElementById(campo).classList.remove('is-invalid');
	document.getElementById(campo).classList.add('is-valid');
	document.getElementById(`formulario_informacion_${campo}`).classList.remove('formulario_input-error-activo');
	document.getElementById(`formulario_informacion_${campo}`).classList.add('formulario_input-error');
	document.getElementById(campo).classList.add('is-invalid');
	document.getElementById(`formulario_informacion_${campo}`).classList.add('formulario_input-error-activo');
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(campo).classList.remove('is-invalid');
		document.getElementById(campo).classList.add('is-valid');
		document.getElementById(`formulario_informacion_${campo}`).classList.remove('formulario_input-error-activo');
		document.getElementById(`formulario_informacion_${campo}`).classList.add('formulario_input-error');
		campos[campo]=true;
	}else{
		document.getElementById(campo).classList.add('is-invalid');
		document.getElementById(`formulario_informacion_${campo}`).classList.add('formulario_input-error-activo');
		campos[campo]=false;
		registrate.disabled=true;
	}
}

//Funciones de validación de carácteres 
function validarNombres(e){
	if (e.charCode >= 65 && e.charCode <= 90 || e.charCode >= 97 && e.charCode <= 122 || e.charCode ==32){
		return true;
	}else{
		return false;
	}	
}

function validarApellidos(e){
	if (e.charCode >= 65 && e.charCode <= 90 || e.charCode >= 97 && e.charCode <= 122 || e.charCode ==32){
		return true;
	}else{
		return false;
	}	
}

function validarCorreo(e){
	if (e.charCode >= 48 && e.charCode <= 57 || e.charCode >= 64 && e.charCode <= 90 || e.charCode >= 97 && e.charCode <= 122 || e.charCode ==46 || e.charCode ==95 || e.charCode ==45){
		return true;
	}else{
		return false;
	}	
}

function validarRfc(e){
	if (e.charCode >= 48 && e.charCode <= 57 || e.charCode >= 65 && e.charCode <= 90 || e.charCode >= 97 && e.charCode <= 122){
		return true;
	}else{
		return false;
	}	
}

//Función para pasar minúsculas a mayúsculas.
function minusculaAMayuscula(e){
	//Guarda el valor de los input en un texto para hacerlo mayúscula.
	const texto=e.target.value;
	e.target.value=texto.toUpperCase();
}

//Listeners
//Listener para cambiar de minúscula a mayúscula.
inputs.forEach((input)=>{
	input.addEventListener("keyup",minusculaAMayuscula);
	input.addEventListener("keyup",validarFormulario);
});

function habilitarBoton(){
	if(campos.nombres && campos.apellidos && campos.correoElectronico && campos.rfc && campos.captcha){
		registrate.disabled=false;
	}
}

//Validación general del formulario.
formulario.addEventListener("keyup",(e)=>{
	e.preventDefault();
	habilitarBoton();
});



function validarCaptcha(){
	campos.captcha=true;
	habilitarBoton();
}




//Expresiones regulares para comprobar la escritura de los formularios.
const expresiones = {
	nombres: /^[a-z-A-Z]\w*\s?[a-z-A-Z]{2,90}\w*$/, //Solo recibe Letras, un espacio opcional y letras. Ej. (Miguel Angel).
	apellidos: /^[a-z-A-Z]\w*\s?[a-z-A-Z]{4,90}\w*$/, //Solo recibe Letras, un espacio opcional y letras. Ej. (Gonzales Pineda).
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Recibe texto en formato correo. Ej. ejemplo@ejemplo.com
	rfc: /^.{5,30}$/ // 4 a 30 digitos.
}



