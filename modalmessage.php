

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

 <body>

<form method="post">
 <div class="modal fade" id="modalmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
          <h5>Are you sure you want to send a Message?</h5>
        </div>
                <div class="modal-body">
    <div class="container-fluid">
     <div class="form-group input-group">
      <span class="input-group-addon" style="width:150px;">Contact Person:</span>
      <input type="text" style="width:350px;" class="form-control" name="phone" id="ephone" 
      value="<?php if (isset($_POST['create'])) {echo $_POST['phone'];} ?>" required>
     </div>
        
    </div>
    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" name="create" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Send</button>
                </div>
            </div>
        </div>
    </div>

    </form>

 </body>


 <?php 
 if (isset($_POST['create'])) {
  
    $phone = $_POST['phone'];
  

        require_once 'vendor/autoload.php';
        $messagebird = new MessageBird\Client('naNVtHU8uo5Y8l8x3obvbiNox');
        $message = new MessageBird\Objects\Message;
        $message->originator = '+639667202744';
        $message->recipients = [$phone];
        $message->body = 'Good day maam/sir, You can now claim your laundry!';
        $response = $messagebird->messages->create($message);
        // print_r(json_encode($response));
    
   }
   ?>
</html>