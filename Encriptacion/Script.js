/* ---------------------PARA ENCRIPTADO DE DATOS----------------------- */
let $contraseña = document.querySelector('#ContraseñaEnc')
const $textoEncriptada = document.querySelector("#InfoEnc");
const $MensEnc= document.querySelector('#InfoResult');
/* ---------------------PARA DESENCRIPTADO DE DATOS----------------------- */
const $MensDesc= document.querySelector('#InfoDesc');
const $ContraDesc= document.querySelector('#ContraseñaDesc');
/* ---------------------------------------Funcion para validar campos vacios--------------------------------------------------- */
function ValidarCampos(contraseña,MensEnc) {
    const Contraseña= contraseña.value;
    const texto= MensEnc.value;
        if (Contraseña) {
            if (texto) {
                res =true;
                return res
            } else {
                alert("No haz ingresado un texto para encriptar")
            }
        } else {
            alert("No haz ingresado una contraseña para el mensaje que vas a encriptar")
        }
}
function ValidarCamposEnc(MensDesc,ContraDesc) {
    const Contraseña= ContraDesc.value;
    const texto= MensDesc.value;
        if (Contraseña) {
            if (texto) {
                res =true;
                return res
            } else {
                alert("No haz ingresado un texto para desencriptar")
            }
        } else {
            alert("No haz ingresado la contraseña del mensaje encriptado")
        }
}