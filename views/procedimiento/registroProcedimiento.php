

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Registro del Paciente</div>
                        <div class="card-body card-block">
                            <form id="alta_Paciente">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text" name="nPaciente" id="nPaciente" placeholder="Ingresa nombre del paciente" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text"  name="apellidoPat" id="apellidoPat" placeholder="Ingresa apellido Parterno" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input type="text"  name="apellidoMat" id="apellidoMat" placeholder="Ingresa apellido materno" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                                        <input type="text"  name="hospital" id="hospital" placeholder="Ingresa hospital" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-h-square"></i></div>
                                        <input type="text"  name="cuartoHospital" id="cuartoHospital" placeholder="Ingresa el cuarto de Hospital" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text"  name="numPaciente" id="numPaciente" placeholder="Ingresa Telefono" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text"  name="email" id="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                
                                 <!--<input type="hidden" name="idPaciente" value="<?php  
                                $lastid = mysqli_insert_id($con); 
                                echo "last id : ".$lastid;
                                ?>">-->
                            
                                <div class="row" id="load" hidden="hidden">
                                    <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                        <img src="img/load.gif" width="100%" alt="">
                                    </div>
                                    <div class="col-xs-12 center text-accent">
                                        <span>Validando información...</span>
                                    </div>
                                </div>

                            <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaP">Submit</button></div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->
      

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Alta de caso médico</div>
                        <div class="card-body card-block">
                            <form id="alta_Caso">
                                 <div class="col col-md-2"></div>
                            
                                <label for="select" class=" form-control-label">Paciente</label>
                                <select name="selectPas" id="selectPas" class="form-control">
                                   
                                    <?php 
                                    require_once("model/paciente.php");
                                    $obj=new Paciente();
                                    $datos=$obj->getListPaciente();
                                    foreach ($datos as $key ) {
                                    ?>
                                    <option value="<?php echo $key['idPaciente']; ?>"><?php echo $key['nombrePaciente']; ?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>

                                     <label for="select" class=" form-control-label">Aseguradora</label>
                                     <select name="selectAs" id="select" class="form-control">
                                    <option value="0">Seleccionar</option>
                                    <?php 
                                    require_once("model/aseguradora.php");
                                    $obj=new Aseguradora();
                                    $datos=$obj->getListAseguradora2();
                                    foreach ($datos as $key ) {
                                    ?>
                                    <option value="<?php echo $key['Aseguradora_idAseguradora']; ?>"><?php echo $key['usuarioAseguradora']; ?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                                    
                                    </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                        <input type="text" name="siniestro" placeholder="siniestro" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                       <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                        <input type="text"  name="descripcion" placeholder="descripcion" class="form-control">
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <div class="input-group">
                                       <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                        <input type="date"  name="fecha" placeholder="fecha" class="form-control">
                                    </div>
                                </div>

                         

                                <div class="form-group">
                                    <div class="input-group">
                                         <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                        <input type="text"  name="rol" placeholder="rol" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                        <input type="text" name="honorario" placeholder="honorario" class="form-control">
                                    </div>
                                </div>
                              
                              

                                 <div class="row" id="load" hidden="hidden">
                                    <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                                        <img src="img/load.gif" width="100%" alt="">
                                    </div>
                                    <div class="col-xs-12 center text-accent">
                                        <span>Validando información...</span>
                                    </div>
                                </div>

                            <div class="form-actions form-group"><button type="button" class="btn btn-primary btn-block" id="altaC">Submit</button></div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->