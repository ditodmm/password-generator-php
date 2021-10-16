<?php
if(isset($_POST['generate'])){
    $result='';

   switch ($_POST['len']) {
    case '8':
        PassGenerator(8);
        break;
    case '12':
        PassGenerator(12);
        break;
    case '16':
        PassGenerator(16);
        break;
    case '20':
        PassGenerator(20);
        break;
    case '24':
        PassGenerator(24);
        break;
    default:
        PassGenerator(8);
        break;
    }
}

function PassGenerator($len){
    global $result;
    $ValidChar='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*';
    while (0<$len--){
        $result.=$ValidChar[random_int(0, strlen($ValidChar)-1)];
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Password Generator</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="m-auto col-lg-6 p-3">
        <div class="container">
            <div class="card shadow">
                <div class="card-header"><strong>PASSWORD GENERATOR</strong></div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Password Length</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select class="form-control" name="len">
                                    <?php
                                    for($i = 8; $i <= 24; $i+=4){
                                        echo "<option value='$i'>$i</option>";
                                    }?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="submit" class="btn btn-primary" name="generate" value="Generate">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label>Password</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="password" name="result" value="<?= @$result ?>">
                                </div>
                                <div class="col-lg-4">
                                    <button class="btn btn-primary" onclick="myFunction()">Copy text</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function myFunction() {
    var copyText = document.getElementById("password");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Copied the text: " + copyText.value);
    }
</script>
</html>
