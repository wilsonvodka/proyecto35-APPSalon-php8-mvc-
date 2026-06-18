let paso = 1;

document.addEventListener('DOMContentLoaded', function(){
    iniciarApp();
});

function iniciarApp(){
    
    tabs(); // cambia la seccion cuando se presione los tabs

}

function mostrarSeccion(){
    //selecionar la seccion con el paso
    const pasoSelector = `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');
    
}

function tabs(){
    const botones = document.querySelectorAll('.tabs button')
    
    botones.forEach((boton)=>{
        boton.addEventListener('click', function(e){
            paso = parseInt(e.target.dataset.paso)
            
            mostrarSeccion();
            
        })
    })

}