<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon"
          type="image/png"
          href="components/favicon.png" />
    <title>users</title>
</head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title main-form-modal" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal-form">
                    <label for="first">First Name</label>
                    <input required name="first" type="text">
                    <label for="first">Second Name</label>
                    <input required name="second" type="text">
                    <div class="custom-control custom-switch">
                        <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Not Active / Active</label>
                    </div>
                    <select name="role">
                        <option value="null">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <span id="addFormInfo" class="info-ok-button"></span>
                <button type="button" class="close-btn btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="button" class="form-accept-btn btn btn-primary" value="Accept">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="delete-button delete btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>
<div class="container bootstrap snippet">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-box">
                    <div class="widget-header bordered-bottom bordered-themesecondary">
                        <?php include 'components/header.php'?>
                    </div><!--Widget Header-->
                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div class="tickets-container">
                                <ul class="tickets-list">
                                    <?php include 'components/headerTable.php'; ?>
                                </ul>
                                <ul class="tickets-list" id="output-list">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="widget-header bordered-bottomUp bordered-themesecondary">
                        <?php include 'components/header.php'?>
                    </div><!--Widget Header-->
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="jquery-3.5.1.min.js"></script>
<script src="js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>