<?php
 require_once 'app/controller/Controller.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
        integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    <link rel='stylesheet' href='app/resources/css/style.css'>
    <title>Document</title>
</head>

<body>
    <div class='container'>
        <div class='info'>
        </div>
        <div class='nav'>
            <div class='links'>
                <a href='servicii'>Serviciile noastre</a>
                <a href='vanzari'>De vanzare</a>
            </div>
        </div>
        <div class='news'>
            <table class='table .table-striped .table-borderless'>
                <thead>
                    <tr>
                        <th>ANUNTURI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($this->infoController->readInfos() as $value) {
                    ?>
                        <tr>
                            <td>
                                <div class='anunt'><?php echo $value['i_text'];?>
                                <span class ='data'><?php echo '- postat '.$value['i_date'];?></span> 
                                </div>
                            </td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class='location'>
            <iframe
                src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d91844.59713403689!2d22.973873!3d43.997756!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47537079500311eb%3A0x3baa9d6617b41076!2sParking+Auto+Ba%C8%99cov%2C+E79%2C+205200%2C+Romania!5e0!3m2!1sen!2sus!4v1556980608692!5m2!1sen!2sus'
                frameborder='0' style='border:0' allowfullscreen></iframe>
        </div>
        <div class='content-area'>
