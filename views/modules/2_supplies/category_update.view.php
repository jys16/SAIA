       <!-- Migas de Pan -->
       <div class="migas row m-2 d-flex align-items-center bg-white border-bottom">
            <div class="col p-0">
                <div aria-label="breadcrumb">
                    <ol class="breadcrumb rounded-0 m-0 p-2 bg-white">
                        <li class="breadcrumb-item"><a href="?c=Dashboard">Inicio</a></li>
                        <li class="breadcrumb-item">Módulo Insumos</li>
                        <li class="breadcrumb-item active" aria-current="page">Actualizar Categoria</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <!-- Título -->
        <div class="titulo-contenido m-2 row">
            <div class="col p-2 border-bottom d-flex justify-content-center align-items-center">
                <div class="col-6 p-0 d-flex justify-content-start align-items-center">
                    <h5 class="m-0">Actualizar Categoria</h5>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center p-0">
                    <a href="?c=Supplies&a=readCategory" class="btn btn-light">Consultar Categorias</a>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="contenido row bg-light m-2 p-2">
            <div class="col p-0 bg-light">
                <form id="formCategoryCreate" name="formCategoryCreate" class="card p-3 bg-info text-white d-lg-flex justify-content-center w-100 border rounded p-2 needs-validation" action="?c=Supplies&a=updateCategory" method="post" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="categoria_codigo">Código Categoria</label>
                            <input type="text" class="form-control" name="categoria_codigo" id="categoria_codigo" placeholder="Código Categoria" pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Codigo(s) Válido(s)" value="<?php echo $categorias->getCodigoCategoria(); ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="categoria_nombre">Nombre Categoria</label>
                            <input type="text" class="form-control" name="categoria_nombre" id="categoria_nombre" placeholder="Nombre" pattern="[ a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ]{2,50}"
							title="Ingrese Nombre(s) Válido(s)" value="<?php echo $categorias->getNombreCategoria(); ?>" required>
                        </div>
                    </div>
                        <br>                    
                        <input type="submit" class="btn btn-secondary mb-2" value="Enviar">
                        <button type="button" id="submit-category-create-cancel" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                </form>
            </div>
        </div>