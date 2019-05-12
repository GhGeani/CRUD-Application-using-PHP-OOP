<?php
    require_once 'app/controller/Controller.php';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="app/resources/css/admin-index.css">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="app/resources/js/admin.js"></script>
    <title>Document</title>
</head>

<body>
   



    <div class="grid-container">
        <div class="create-contact">
            <form method="POST" action="admin-panel">
                    <div class="form-group">
                        <label for="c_name">Nume contact</label>
                        <input type="text" class="form-control" name="c_name" id="c_name" rows="3"
                            placeholder="Nume "></textarea>
                    </div>
                    <div class="form-group">
                        <label for="c_phone">Telefon</label>
                        <input type="text" class="form-control" name="c_phone" id="c_phone" placeholder="Telefon">
                    </div>
                    <button type="submit" name="submit_contact" class="btn btn-info btn-sm btn-block" id = 'create-info'>Salveaza</button>
                </form>
            </div>
            <div class="manage-articles">
                    <p class="text-muted text-left">Articole de vanzare salvate</p>
            </div>
            <div class="create-article">
                <form method="POST" action="#">
                    <div class="form-group">
                        <label for="a_title">Titlu</label>
                        <input type="text" class="form-control" name="a_title" id="a_title" placeholder="Titlu">
                    </div>
                    <div class="form-group">
                        <label for="a_text">Descriere</label>
                        <textarea class="form-control" name="a_text" id="a_text" rows="3"
                            placeholder="Descrierea anuntului"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="a_date">Data</label>
                        <input type="text" class="form-control" name="a_date" id="a_date" placeholder="Data">
                    </div>
                    <div class="form-group">
                        <label for="a_image">Image</label>
                        <input type="file" class="form-control-file" name="a_image" id="a_image">
                    </div>
                    <button type="submit" name="submit-article" class="btn btn-info btn-sm btn-block">Salveaza</button>
            </form>
        </div>

        <div class="manage-contacts">

        </div>

        <div class="manage-infos">
            <table class='table .table-striped .table-bordered'>
                <?php if($this->infoController->readInfos()) { ?>

                <thead>
                    <tr>
                        <td class= 'text-muted text-center'>Anunturi salvate</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($this->infoController->readInfos() as $value) {
                    ?>
                        <tr>
                            <td class='anunt'>
                                <?php echo $value['i_text'];?>
                            </td>
                            <td class ='data'>
                                <?php echo $value['i_date'];?>
                            </td>
                            <td>
                            <button name= "delete" class='btn btn-sm btn-danger btn-delete' id="<?php echo $value['id'];?>" data-toggle="modal" data-target="#deleteModal">Sterge</button>
                            <button name= "edit" class='btn btn-sm btn-warning btn-edit' id="<?php echo $value['id'];?>">Editeaza</button>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
                    <?php } else {
                        echo '<thead><tr><td><p class="text-muted text-center">Nu sunt anunturi salvate</p></td></tr></thead>';
                    } ?>
            </table>
        </div>
        <div class="create-info">
            <form method="POST" action="admin-panel">
                <div class="form-group">
                    <label for="i_text">Anunt</label>
                    <textarea class="form-control" name="i_text" id="i_text" rows="3"
                        placeholder="Descrierea anuntului"></textarea>
                </div>
                <div class="form-group">
                    <label for="i_date">Data</label>
                    <input type="text" class="form-control" name="i_date" id="i_date" placeholder="Data">
                </div>
                <button type="submit" name="submit_info" class="btn btn-info btn-sm btn-block" id = 'create-info'>Salveaza</button>
            </form>
        </div>
        <div class="manage-articles">
                <p class="text-muted text-left">Articole de vanzare salvate</p>
        </div>
        <div class="create-article">
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="a_title">Titlu</label>
                    <input type="text" class="form-control" name="a_title" id="a_title" placeholder="Titlu">
                </div>
                <div class="form-group">
                    <label for="a_text">Descriere</label>
                    <textarea class="form-control" name="a_text" id="a_text" rows="3"
                        placeholder="Descrierea anuntului"></textarea>
                </div>
                <div class="form-group">
                    <label for="a_date">Data</label>
                    <input type="text" class="form-control" name="a_date" id="a_date" placeholder="Data">
                </div>
                <div class="form-group">
                    <label for="a_image">Image</label>
                    <input type="file" class="form-control-file" name="a_image" id="a_image">
                </div>
                <button type="submit" name="submit-article" class="btn btn-info btn-sm btn-block">Salveaza</button>
            </form>
        </div>
            <div class="create-service">
                <form method="POST" action="admin-panel">
                <div class="form-group">
                    <label for="s_name">Servicii</label>
                    <textarea class="form-control" name="s_name" id="s_name" rows="3"
                        placeholder="Descrierea Serviciul"></textarea>
                </div>
                    <button type="submit" name="submit_service" class="btn btn-info btn-sm btn-block" >Salveaza</button>
                </form>
            </div>
            <div class="manage-services">
            <table class='table .table-striped .table-bordered'>
                <?php if($this->infoController->readInfos()) { ?>
                <thead>
                    <tr>
                        <td class= 'text-muted text-center' colspan="2">Servicii salvate</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($this->serviceController->readInfos() as $value) {
                    ?>
                        <tr>
                            <td class='name'>
                                <?php echo $value['s_name'];?>
                            </td>
                            <td>
                            <button name= "delete" class='btn btn-sm btn-danger btn-delete' id="<?php echo $value['id'];?>" data-toggle="modal" data-target="#deleteModal">Sterge</button>
                            <button name= "edit" class='btn btn-sm btn-warning btn-edit' id="<?php echo $value['id'];?>">Editeaza</button>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
                <?php } else {
                        echo '<thead><tr><td><p class="text-muted text-center">Nu sunt servicii salvate</p></td></tr></thead>';
                    } ?>
            </table>
            </div>
    </div>
    </div>

    <!-- Modal for delete confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Trebuie sa confirmi stergerea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inapoi</button>
        <button type="button" class="btn btn-danger confirmDelete" data-dismiss="modal">Sterge</button>
      </div>
    </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>