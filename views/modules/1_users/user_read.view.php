        <!-- Migas de Pan -->
        <div class="migas row m-2 d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Usuarios</li>
                        <li class="breadcrumb-item active" aria-current="page">Consultar Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Título -->
        <div class="titulo-contenido row m-2">
            <div class="col p-2 border-bottom d-flex justify-content-center align-items-center">
                <div class="col-6 p-0 d-flex justify-content-start align-items-center">
                    <h5 class="m-0">Consultar Usuarios</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center p-0">
                    <a href="?c=Users&a=createUser" class="btn btn-primary">Crear Usuario</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido row bg-light m-2 p-2">
            <div class="cont-tabla col p-0 bg-light">
                <table id="data-tables" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>                            
                            <th>Nombre Rol</th>
                            <th>Documento</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Telefono</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user->getNombreRol(); ?></td>
                                <td><?php echo $user->getDocumento(); ?></td>
                                <td><?php echo $user->getApellidosUser(); ?></td>
                                <td><?php echo $user->getNombresUser(); ?></td>
                                <td><?php echo $user->getCorreoUser(); ?></td>
                                <td><?php echo $user->getPass(); ?></td>
                                <td><?php echo $user->getTelefono(); ?></td>
                                <td><?php echo $user->getFoto(); ?></td>
                                <td><?php echo $user->getUserStatus(); ?></td>
                                <td class="tabla-acciones">
                                    <a class="tabla-edit" href="?c=Users&a=updateUser&documento=<?php echo $user->getDocumento(); ?>"><i class="fas fa-edit"></i></a>
                                    <a class="tabla-delete" href="?c=Users&a=deleteUser&documento=<?php echo $user->getDocumento(); ?>" onclick="deleteUser()"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre Rol</th>
                            <th>Documento</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Telefono</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>