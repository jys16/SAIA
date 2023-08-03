        <!-- Migas de Pan -->
        <div class="migas row m-2 d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Compras</li>
                        <li class="breadcrumb-item active" aria-current="page">Consultar Proveedores</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Título -->
        <div class="titulo-contenido row m-2">
            <div class="col p-2 border-bottom d-flex justify-content-center align-items-center">
                <div class="col-6 p-0 d-flex justify-content-start align-items-center">
                    <h5 class="m-0">Consultar Proveedores</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center p-0">
                    <a href="?c=Purchases&a=createSupplier" class="btn btn-primary">Crear Proveedor</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido row bg-light m-2 p-2">
            <div class="cont-tabla col p-0 bg-light">
                <table id="data-tables" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>Nit</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suppliers as $supplier): ?>
                            <tr>
                                <td><?php echo $supplier->getNit(); ?></td>
                                <td><?php echo $supplier->getNombreSupplier(); ?></td>
                                <td><?php echo $supplier->getDireccionSupplier(); ?></td>
                                <td><?php echo $supplier->getCorreoSupplier(); ?></td>
                                <td><?php echo $supplier->getTelefonoSupplier(); ?></td>
                                <td class="tabla-acciones">
                                    <a class="tabla-edit" href="?c=Purchases&a=updateSupplier&nit=<?php echo $supplier->getNit(); ?>"><i class="fas fa-edit"></i></a>
                                    <a class="tabla-delete" href="?c=Purchases&a=deleteSupplier&nit=<?php echo $supplier->getNit(); ?>" onclick="deleteSupplier()"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nit</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>