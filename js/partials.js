//busca en html los elementos y los guarda en la variable con al referencia const 
const btnToggle =document.querySelector('.btn-toggle');
const menuResponsive = document.querySelector('.menu-responsive');
const navLinks = document.querySelectorAll('.menu-responsive a'); //va a tomar todas las etiquetas a que esten en el menu responsive
//si btntoggle existe busta el i dentro del boton, si no existe guarda el null, esto evita error si el boton no sta en al pag
const icon = btnToggle ? btnToggle.querySelector('i') : null;
const header =document.querySelector('.site-header');

//Toggle icon, evento del boton abrir y cerrar

if(btnToggle && menuResponsive){//verifica que ambos existan si existen ejecuta el codigo si no no hace nada
    btnToggle.addEventListener('click',() =>{// escucha cuando haces clcik en el boton
        menuResponsive.classList.toggle('show');// mostrar /ocultar menu.. alterna la clase show si no la tiene entonces la agrega ...y si la tiene la quita, esto es lo que abre y cierra el menu
    if (icon){//si el icono existe
        if(menuResponsive.classList.contains('show')){//aca pregunta si el menu esta abierto
            icon.classList.remove('fa-bars');//si esta abierto cambia los icon hambur por la x
            icon.classList.add('fa-xmark');

            const headerHeight = header.offsetHeight;//obtiene la altura del header
            menuResponsive.style.top = `${headerHeight}px`;//coloca el menu por del header
            
            } else{//si el menu esta cerrado vuelve el icon hambur
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');

            }
            }

            });
        }
                //se cierra el menu cuando le doy click a cualquiera de las opciones del menu
        navLinks.forEach(link =>{// el navlink es la lisnta de todos los a del menu
            // el foreach recorre cada uno de estos a
            link.addEventListener('click', () => {//esto detecta cuando haces click en un link
                menuResponsive.classList.remove('show');//quita la clase show, osea menu cerrado

                //cambiamos icon
                if(icon){ //verifica que exista un icono
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                }
            });
        });
    