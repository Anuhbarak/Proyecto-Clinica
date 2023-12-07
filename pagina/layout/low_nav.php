



              <?php

?>
<style>
.card{
  display: flex;
  height: 200px;
 }
.card video{
  width: 0px;
  flex-grow: 1;
  object-fit: cover;
  filter: brightness(80%);
  transition: .5s ease;
}
.card video:hover{
  width: 50px;
  opacity: 1;
  filter: brightness(130%);
}
.card h4{
  width: 0px;
  text-align: center;
  flex-grow: 1;
  object-fit: cover;
  filter: brightness(80%);
  transition: .5s ease;
}
.card h4:hover{
  width: 50px;
  opacity: 1;
  filter: brightness(130%);
}
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}
body{
   
}
/*:::Boton-Modal:::*/
.boton-modal{
    padding: 40px;
    background-color: #fff;
}
.boton-modal label{
    padding: 10px 15px;
    background-color: #5488a3;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: all 300ms ease;
}
.boton-modal label:hover{
    background-color: #185E83;
}
/*:::Fin Boton-Modal:::*/

/*:::Ventana Modal:::*/
#btn-modal{
    display: none;
}
.container-modal{
    width: 100%;
    height: 100vh;
    position: fixed;
    top: 0; left: 0;
    background-color: rgba(144, 148, 150, 0.8);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 100;
}
#btn-modal:checked ~ .container-modal{
    display: flex;
}
.content-modal{
    width: 100%;
    max-width: 90%;
    padding: 20px;
    background-color: #fff;
    border-radius: 4px;
}
.content-modal h2{
    margin-bottom: 15px;
}
.content-modal p{
    padding: 15px 0px;
    border-top: 1px solid #dbdbdb;
    border-bottom: 1px solid #dbdbdb;
}
.content-modal .btn-cerrar{
    width: 100%;
    margin-top: 15px;
    display: flex;
    justify-content: flex-end;
}
.content-modal .btn-cerrar label{
    padding: 7px 10px;
    background-color: #5488a3;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: all 300ms ease;
}
.content-modal .btn-cerrar label:hover{
    background-color:#185E83;
}
.cerrar-modal{
    width:100%;
    height: 80vh;
    position: absolute;
    top:0; left: 0;
    z-index: -1;
}
@media screen and (max-width:800px) {
    .content-modal{
        width: 90%;
    }
}
/*:::Fin Ventana Modal:::*/
.light-button label.bt {
  padding: 5em;
  position: relative;
  height: 150px;
  display: flex;
  align-items: flex-end;
  outline: none;
  background: none;
  border: none;
}

.light-button label.bt .button-holder {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 50px;
  width: 100px;
  background-color: ##2A3F54;
  border-radius: 5px;
  color: #2A3F54;
  font-weight: 700;
  transition: 300ms;
  outline: ##2A3F54 2px solid;
  outline-offset: 20;
}

.light-button label.bt .button-holder svg {
  height: 50px;
  fill: #2A3F54;
  transition: 300ms;
}

.light-button label.bt .light-holder {
  position: absolute;
  height: 120px;
  width: 100px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.light-button label.bt .light-holder .dot {
  position: absolute;
  top: 0;
  width: 10px;
  height: 10px;
  background-color: #0a0a0a;
  border-radius: 10px;
  z-index: 2;
}
/*Luz que emite*/ 
.light-button label.bt .light-holder .light {
  position: absolute;
  top: 0;
  width: 200px;
  height: 120px;
  clip-path: polygon(50% 0%, 25% 100%, 75% 100%);
  background: transparent;
}

.light-button label.bt:hover .button-holder svg {
  fill: rgba(255, 255, 255, 1);/*Aqui*/
}

.light-button label.bt:hover .button-holder {
  color: rgba(255, 255, 255, 1);
  outline: rgba(255, 255, 255, 1) 2px solid;/*Aqui*/
  outline-offset: 2px;
}

.light-button label.bt:hover .light-holder .light {
  background: rgb(255, 255, 255);
  background: linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 10%);
}
.wrapper {
  display: flex;
  background: #F7F7F7;
  list-style: none;
  height: 120px;
  width: 100%;
  padding-top: 40px;
  font-family: "Poppins", sans-serif;
  justify-content: center;
}

.wrapper .icon {
  position: relative;
  background: #F7F7F7;
  margin: 10px;
  width: 100px;
  height: 250px;
  font-size: 18px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .tooltip {
  position: absolute;
  top: 0;
  font-size: 14px;
  background: #F7F7F7;
  color: #2A3F54;
  padding: 5px 8px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .tooltip::before {
  position: absolute;
  content: "";
  height: 8px;
  width: 8px;
  background: #F7F7F7;
  bottom: -3px;
  left: 50%;
  transform: translate(-50%) rotate(45deg);
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon:hover .tooltip {
  top: -45px;
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

.wrapper .icon:hover span,
.wrapper .icon:hover .tooltip {
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
}

.wrapper .facebook:hover,
.wrapper .facebook:hover .tooltip,
.wrapper .facebook:hover .tooltip::before {
  background: #2A3F54;
  color: #fff;
}

#button {
  background-color: transparent;
  color: #2A3F54;
  font-size: 15px;
  text-align: center;
  display: flex;
  width: 100px;
  height: 250px;
  justify-content: center;
  
}
.botonPerso {
  background-color: transparent;
  text-decoration:none;
  font-weight:600;
  font-size:20px;
  color:#ffffff;
  padding-top:20px;
  padding-bottom:90px;
  padding-left:90%;
  padding-right:10px;
}

</style>

<br>
<br>
<br>

<div class="light-button">
     <label class="bt" for="btn-modal">
        <div class="light-holder">
            <div class="dot"></div>
            <div class="light"></div>
        </div>
        <div class="button-holder">
            <svg role="img" viewBox="0 0 24 24" xmlns="">
                
            </svg>
            <p>Ver Vídeos</p>
        </div>
</label>
</div>

<!--Fin de Boton-->
<!--Ventana Modal-->
    <input type="checkbox" id="btn-modal">
    <div class="container-modal">
        <div class="content-modal">
        <div class="card">
                         <!-- <video src="../../Videos/Hola.mp4" controls></video>
                          <video src="../../Videos/Mision.mp4" controls></video>
                          <video src="../../Videos/Peso.mp4" controls></video>
                          <video src="../../Videos/Estatura.mp4" controls></video>
                          <video src="../../Videos/Guante.mp4" controls></video>
                          <video src="../../Videos/Final.mp4" controls></video>
                      
                      </div>
                    <div class="card">
                      <h4>Saludo</h4>
                      <h4>Mision</h4>
                      <h4>Peso</h4>
                      <h4>Estatura</h4>
                      <h4>Guante</h4>
                      <h4>Despedida</h4>-->
                      <ul class="wrapper">
    <li class="icon facebook">
    <botton id="button" class="button" onClick="redirect('../Videos_HTML/Saludo.html')">
      SALUDO </botton>
        
        <span class="tooltip">SALUDO</span>
        <span><i class="fab fa-facebook-f"></i></span>
    </li>
    <li class="icon facebook">
    <botton id="button" class="button" onClick="redirect('../Videos_HTML/Mision.html')">
      MISIÓN </botton>
        
        <span class="tooltip">MISIÓN</span>
        <span><i class="fab fa-facebook-f"></i></span>
    </li>
    <li class="icon facebook">
    <botton id="button" class="button" onClick="redirect('../Videos_HTML/Estatura.html')">
      ESTATURA </botton>
        
        <span class="tooltip">ESTATURA</span>
        <span><i class="fab fa-facebook-f"></i></span>
    </li>
    <li class="icon facebook">
    <botton id="button" class="button" onClick="redirect('../Videos_HTML/Peso.html')">
      PESO </botton>
        
        <span class="tooltip">PESO</span>
        <span><i class="fab fa-facebook-f"></i></span>
    </li>
    <li class="icon facebook">
    <botton id="button" class="button" onClick="redirect('../Videos_HTML/Guante.html')">
      GUANTE </botton>
        
        <span class="tooltip">GUANTE</span>
        <span><i class="fab fa-facebook-f"></i></span>
    </li>
    <li class="icon facebook">
    <botton id="button" class="button" onClick="redirect('../Videos_HTML/Final.html')">
      DESPEDIDA </botton>
        
        <span class="tooltip">DESPEDIDA</span>
        <span><i class="fab fa-facebook-f"></i></span>
    </li>
</ul>
                    </div>
            <div class="btn-cerrar">
                <label for="btn-modal">Cerrar</label>
            </div>
        </div>
        <label for="btn-modal" class="cerrar-modal"></label>
    </div>
<!--
 <div class="card">
                          <video src="../../Videos/Hola.mp4" controls></video>
                          <video src="../../Videos/Mision.mp4" controls></video>
                          <video src="../../Videos/Peso.mp4" controls></video>
                          <video src="../../Videos/Estatura.mp4" controls></video>
                          <video src="../../Videos/Guante.mp4" controls></video>
                          <video src="../../Videos/Final.mp4" controls></video>
                      
                      </div>
                    <div class="card">
                      <h4>Saludo</h4>
                      <h4>Mision</h4>
                      <h4>Peso</h4>
                      <h4>Estatura</h4>
                      <h4>Guante</h4>
                      <h4>Despedida</h4>
                    </div>-->