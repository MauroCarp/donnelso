<div class="col-lg-1 col-xs-2"></div>

<div v-for="(animal, index) in cajasSuperiores" :key="index" class="col-lg-2 col-xs-4">

  <div class="small-box bg-green">
    
    <div class="inner">
      
      <p>{{ animal.tipo }}<br>
        <strong><span :id="animal.idCantidad"></span></strong> <br>
        $ <span :id="animal.idPrecio"></span> Kg
      </p>

    </div>
    
    <div class="icon">
      
      <i :class="animal.icono"></i>
    
    </div>

  </div>

</div>

<div class="col-lg-1 col-xs-2"></div>