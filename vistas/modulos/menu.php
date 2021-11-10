<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<?php


				echo '
				<li class="active">

					<a href="inicio">

						<i class="fa fa-home"></i>
						<span>Inicio</span>

					</a>

				</li>
		
				<li class="treeview">

					<a href="#">

						<i class="fa fa-upload"></i>
						
						<span>Ingresos</span>

						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">

						<li>

							<a href="#" data-toggle="modal" data-target="#ventanaModalCompra">
								
								<i class="fa fa-circle-o"></i>
								<span>Compra</span>

							</a>

						</li>

						<li>

							<a href="registrosCompras">
								
								<i class="fa fa-circle-o"></i>
								<span>Registro de Compras</span>

							</a>

						</li>

						<li>

							<a href="#"  data-toggle="modal" data-target="#ventanaModalParto">
								
								<i class="fa fa-circle-o"></i>
								<span>Parto</span>

							</a>

						</li>

						<li>

							<a href="registroPartos">
								
								<i class="fa fa-circle-o"></i>
								<span>Registros Partos</span>

							</a>

						</li>

					</ul>

				</li>

				<li class="treeview">

					<a href="#">

						<i class="icon-servicios"></i>
						<span>Servicios</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">

						<li>

							<a href="#" data-toggle="modal" data-target="#ventanaModalServicios">
								
								<i class="fa fa-circle-o"></i>
								<span>Cargar Rodeo</span>

							</a>

						</li>

						<li>

							<a href="servicios">
								
								<i class="fa fa-list-alt"></i>
								<span>Lista Rodeos</span>

							</a>

						</li>

						<li>

							<a href="registroServicios">
								
								<i class="fa fa-list-alt"></i>
								<span>Registros Rodeos</span>

							</a>

						</li>

					</ul>

				</li>

				<li>

					<a href="engorde">

						<i class="icon-engorde"></i>
						<span>Engorde</span>

					</a>

				</li>
				
				<li>

					<a href="consumo">

						<i class="fa fa-area-chart"></i>
						
						<span>Consumo</span>

					</a>

				</li>

				<li>

					<a href="sanidad">

						<i class="fa fa-plus-square"></i>
						
						<span>Sanidad</span>

					</a>

				</li>

				<li>

					<a href="muertes">

						<i class="icon-muertes"></i>
						<span>Muertes</span>

					</a>

				</li>

				<li class="treeview">

					<a href="#" >

						<i class="fa fa-cutlery"></i>
						<span>Chazinados</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">
					
						<li>
						
						<a href="chazinados">
						
						<i class="icon-cerdo"></i>
						<span>Carneadas</span>
						
						</a>
						
						</li>

						<li>

							<a href="#" data-toggle="modal" data-target="#ventanaModalVentaChazinados">
								
								<i class="fa fa-dollar"></i>
								<span>Venta</span>

							</a>

						</li>
					
						<li>

							<a href="ventasChazinado">
								
								<i class="fa fa-list-alt"></i>
								<span>Lista Ventas</span>

							</a>

						</li>

					</ul>

				</li>

				<li class="treeview">

					<a href="#" >

						<i class="fa fa-dollar"></i>
						<span>Ventas</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">

						<li>

							<a href="#" data-toggle="modal" data-target="#ventanaModalPreVenta">
								
								<i class="fa fa-circle-o"></i>
								<span>Pre-Venta</span>

							</a>

						</li>

						<li>

							<a href="pre-ventas">
								
								<i class="fa fa-list-alt"></i>
								<span>Lista Pre-Venta</span>

							</a>

						</li>

						<li>

							<a href="ventas">
								
								<i class="fa fa-list-alt"></i>
								<span>Lista Ventas</span>

							</a>

						</li>
					
						<li>

							<a href="#" data-toggle="modal" data-target="#ventanaModalPrecios">
								
								<i class="fa fa-dollar"></i>
								<span>Precios</span>

							</a>

						</li>

					</ul>

				</li>

				<li>

					<a href="usuarios">

						<i class="fa fa-user"></i>
						<span>Usuarios</span>

					</a>
		
				</li>';
					
			?>

		</ul>

	 </section>

</aside>


<?php

    include "modales/preVenta.modal.php";
    include "modales/parto.modal.php";
    include "modales/compra.modal.php";
    include "modales/servicios.modal.php";
    include "modales/chazinado.modal.php";
    include "modales/ventaChazinados.modal.php";
    include "modales/stockChazinado.modal.php";
    include "modales/muertes.modal.php";
    include "modales/precios.modal.php";
    include "modales/buscar.modal.php";

?>
