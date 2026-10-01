<?php include_once('inc/header.php');
require_once('../Business/TagBusiness.php');

$bTag = new TagBusiness($con);

if(isset($_POST['guardar'])){
  unset($_POST['guardar']);
  if(isset($_GET['edit'])){
    $bTag->editTag($_GET['edit'],$_POST);
  }else{
    $bTag->saveTag($_POST);
  }
   redirect('tags.php');
}

if(isset($_GET['del'])){
  if($bTag->eliminar($_GET['del']) != 0){
    redirect('tags.php');
  }else{
    echo '<script>alert("Etoqueta no borrada")</script>';
  }
}


if(isset($_GET['edit'])){
  $dTag = $bTag->getOne($_GET['edit']);
}

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Etiquetas</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Alta/Modificación de Etiquetas</h6>
            </div>
          <div class="card-body">
              <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="name" placeholder="Nombre" value="<?php echo isset($dTag)?$dTag->getName():''?>">
                    </div>
                      <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="active" value="1" class="custom-control-input" id="customCheck" <?php echo isset($dTag)?($dTag->getActive() == 'SI'?'checked="checked"':''):''?>>
                        <label class="custom-control-label" for="customCheck">Activo?</label>
                      </div>
                    </div>
                    <input type="submit" value="Guardar" name="guardar" class="btn btn-primary btn-user btn-block">
              </form>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de Etiquetas</h6>
            </div>
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Activo?</th>
                      <th>Creada</th>
                      <th>Modificada</th> 
                      <th>Acciones</th> 
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Activo?</th>
                      <th>Creada</th>
                      <th>Modificada</th> 
                      <th>Acciones</th> 
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($bTag->getAll() as $tag){ ?>
                        <tr>
                          <td><?php echo $tag->getId();?></td>
                          <td><?php echo $tag->getName();?></td>
                          <td><?php echo $tag->getActive();?></td>
                          <td><?php echo $tag->getCreatedAt();?></td>
                          <td><?php echo $tag->getUpdatedAt();?></td> 
                          <td>
                            <a href="tags.php?edit=<?php echo $tag->getId()?>"class="btn btn-success btn-circle btn-sm">M</a>
                            <a href="tags.php?del=<?php echo $tag->getId()?>"class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>

                          </td> 
                        </tr> 
                    <?php }?>                  
                  </tbody>
                </table>
              </div>
            </div>
        </div>
                    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php require_once('inc/footer.php');?>

    